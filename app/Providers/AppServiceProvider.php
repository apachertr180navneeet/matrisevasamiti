<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\SiteSetting;

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
            if (Schema::hasTable('site_settings')) {
                $dbSettings = SiteSetting::all()->pluck('value', 'key')->toArray();
                
                // Merge DB settings into site config dynamically
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
                if (Schema::hasTable('news_events')) {
                    $footerNews = \App\Models\NewsEvent::where('is_published', true)->orderBy('sort_order', 'asc')->latest('published_date')->take(2)->get();
                    $view->with('footerNews', $footerNews);
                }
            });
        } catch (\Throwable $e) {
            View::share('siteSettings', config('site', []));
        }
    }
}
