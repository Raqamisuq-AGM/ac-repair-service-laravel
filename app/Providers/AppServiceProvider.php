<?php

namespace App\Providers;

use App\Models\Theme;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;


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
        Paginator::useBootstrap();
        if (Schema::hasTable('themes')) {
            // Load active theme
            $themes = Theme::where('status', '1')->first();

            // Set theme data to config
            config([
                'theme.view' => ($themes ? $themes->name : 'default'),
                'theme.asset' => 'themes/' . ($themes ? $themes->name : 'default'),
            ]);
        } else {
            // Handle the case where the table does not exist
            // Set default values or handle the error
            config([
                'theme.view' => 'default',
                'theme.asset' => '/themes/default',
            ]);
        }
    }
}
