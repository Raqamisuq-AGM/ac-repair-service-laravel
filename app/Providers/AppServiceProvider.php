<?php

namespace App\Providers;

use App\Models\EmailGateway;
use App\Models\Theme;
use App\Observers\EmailGatewayObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Authenticatable;

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

        EmailGateway::observe(EmailGatewayObserver::class);

        if (Schema::hasTable('themes')) {
            // Load active theme
            $themes = Theme::where('status', '1')->first();

            // Set theme data to config
            config([
                'theme.name' => ($themes ? $themes->name : 'default'),
            ]);
        } else {
            // Handle the case where the table does not exist
            // Set default values or handle the error
            config([
                'theme.name' => 'default',
            ]);
        }
    }
}
