<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register services here if needed
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadThemeViews();
    }

    /**
     * Load views from the active theme's views folder.
     *
     * @return void
     */
    protected function loadThemeViews()
    {
        $activeTheme = config('theme.name'); // Get the active theme name from configuration
        $viewsPathTheme = base_path("rq_contents/themes/{$activeTheme}/views");
        $viewsPathPlugin = base_path("rq_contents/plugins");
        $viewsPathAddOn = base_path("rq_contents/add_ons");
        $viewsFilamentGlobalPanel = base_path("app/Filament/Views");
        $viewsFilamentThemePanel = base_path("app/Filament/Views/{$activeTheme}");
        $authPanel = base_path("rq_contents/auth");

        $viewsLivewireGlobalPanel = base_path("app/Livewire/Views");
        $viewsLivewireThemePanel = base_path("app/Livewire/Views/{$activeTheme}");

        View::addLocation($viewsPathTheme);
        View::addLocation($viewsPathPlugin);
        View::addLocation($viewsPathAddOn);
        View::addLocation($viewsFilamentGlobalPanel);
        View::addLocation($viewsFilamentThemePanel);
        View::addLocation($authPanel);
        View::addLocation($viewsLivewireGlobalPanel);
        View::addLocation($viewsLivewireThemePanel);
    }
}
