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
