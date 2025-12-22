<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Illuminate\Support\Carbon::setLocale('tr');
        setlocale(LC_TIME, 'tr_TR', 'tr_TR.utf8', 'turkish');

        // Share recent news with footer
        \Illuminate\Support\Facades\View::composer('partials.footer', function ($view) {
            $view->with('recent_news', \App\Models\News::where('is_published', true)->latest('published_at')->take(3)->get());
        });
    }
}
