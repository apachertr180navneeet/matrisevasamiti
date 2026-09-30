<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\SiteSetting;

use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        try {
            // Cache site settings for 24 hours (86400s) to avoid querying MySQL on every request
            $dbSettings = Cache::remember('app_site_settings_array', 86400, function () {
                if (Schema::hasTable('site_settings')) {
                    return SiteSetting::all()->pluck('value', 'key')->toArray();
                }
                return config('site', []);
            });

            if (!empty($dbSettings) && is_array($dbSettings)) {
                foreach ($dbSettings as $k => $v) {
                    if ($v !== null && $v !== '') {
                        config(["site.{$k}" => $v]);
                    }
                }

                // Cross-sync aliases so views using either convention get the dynamic DB value
                $aliases = [
                    'contact_email' => 'email',
                    'contact_phone_primary' => 'phone_primary',
                    'contact_phone_secondary' => 'phone_secondary',
                    'contact_address' => 'address_primary',
                    'contact_address_secondary' => 'address_secondary',
                ];

                foreach ($aliases as $k1 => $k2) {
                    if (isset($dbSettings[$k1]) && $dbSettings[$k1] !== '') {
                        config(["site.{$k2}" => $dbSettings[$k1]]);
                    } elseif (isset($dbSettings[$k2]) && $dbSettings[$k2] !== '') {
                        config(["site.{$k1}" => $dbSettings[$k2]]);
                    }
                }

                // Also sync social media handles into config('site.social.*')
                $socials = [
                    'facebook_url' => 'facebook',
                    'twitter_url' => 'twitter',
                    'instagram_url' => 'instagram',
                    'linkedin_url' => 'linkedin',
                    'youtube_url' => 'youtube',
                ];
                foreach ($socials as $urlKey => $socialKey) {
                    if (isset($dbSettings[$urlKey]) && $dbSettings[$urlKey] !== '') {
                        config(["site.social.{$socialKey}" => $dbSettings[$urlKey]]);
                    }
                }

                View::share('siteSettings', $dbSettings);
            } else {
                View::share('siteSettings', config('site', []));
            }

            View::composer('partials.footer', function ($view) {
                $footerNews = Cache::remember('app_footer_news', 3600, function () {
                    try {
                        if (Schema::hasTable('news_events')) {
                            return \App\Models\NewsEvent::where('is_published', true)
                                ->orderBy('sort_order', 'asc')
                                ->latest('published_date')
                                ->take(2)
                                ->get();
                        }
                    } catch (\Throwable $e) {
                        // ignore
                    }
                    return collect();
                });

                $view->with('footerNews', $footerNews);
            });
        } catch (\Throwable $e) {
            View::share('siteSettings', config('site', []));
        }
    }
}
