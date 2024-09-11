<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class ThemeServiceProvider extends ServiceProvider
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
        $this->loadThemeRoutes();
    }

    /**
     * Load routes from the active theme's route.php file.
     *
     * @return void
     */
    protected function loadThemeRoutes()
    {
        $activeTheme = config('theme.name'); // Get the active theme name from configuration
        $themePath = base_path("rq_contents/themes/{$activeTheme}");

        $routeFile = "{$themePath}/route.php";
        $controllersPath = "{$themePath}/controllers";

        // Include all controller files
        if (File::isDirectory($controllersPath)) {
            foreach (File::allFiles($controllersPath) as $file) {
                require_once $file->getPathname();
            }
        }

        if (File::exists($routeFile)) {
            Route::middleware('web')
                ->group($routeFile);
        }
    }
}
