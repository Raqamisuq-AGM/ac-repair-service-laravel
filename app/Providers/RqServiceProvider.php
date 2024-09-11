<?php

namespace App\Providers;


use App\Repositories\AddOns\AddOnInterface;
use App\Repositories\AddOns\AddOnRepository;
use App\Repositories\Plugins\PluginInterface;
use App\Repositories\Plugins\PluginRepository;
use App\Repositories\Themes\ThemeInterface;
use App\Repositories\Themes\ThemeRepository;
use Illuminate\Support\ServiceProvider;

class RqServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ThemeInterface::class, ThemeRepository::class);
        $this->app->bind(AddOnInterface::class, AddOnRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
