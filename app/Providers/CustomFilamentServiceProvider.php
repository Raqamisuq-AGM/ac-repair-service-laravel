<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class CustomFilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadResources();
        $this->loadRoutes();
        $this->loadMenus();
    }

    /**
     * Load Filament resources from the active theme directory.
     */
    protected function loadResources()
    {
        $activeTheme = config('theme.name'); // Replace with logic to get the active theme dynamically
        $resourcesPath = base_path("rq_contents/themes/{$activeTheme}/Filament/Resources");

        if (is_dir($resourcesPath)) {
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($resourcesPath, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $class = $this->getClassFromFile($file->getPathname());
                    if ($class && class_exists($class)) {
                        // Register the resource with Filament
                        // Note: Filament registration might be specific to your application setup
                        app()->make(\Filament\Filament::class)->registerResources($class);
                        Log::info("Registered resource: " . $class);
                    }
                }
            }
        }
    }

    /**
     * Load routes from the active theme directory.
     */
    protected function loadRoutes()
    {
        $activeTheme = config('theme.name'); // Replace with logic to get the active theme dynamically
        $routesPath = base_path("rq_contents/themes/{$activeTheme}/Filament/Routes");

        if (is_dir($routesPath)) {
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($routesPath, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    require_once $file->getPathname();
                    Log::info("Registered route file: " . $file->getPathname());
                }
            }
        }
    }

    /**
     * Load menu items from the active theme directory.
     */
    protected function loadMenus()
    {
        $activeTheme = config('theme.name'); // Replace with logic to get the active theme dynamically
        $menusPath = base_path("rq_contents/themes/{$activeTheme}/Filament/Menus");

        if (is_dir($menusPath)) {
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($menusPath, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    require_once $file->getPathname();
                    Log::info("Added menu item from file: " . $file->getPathname());
                    // Ensure you actually add the menu items here
                    // Example:
                    $menuItems = include $file->getPathname();
                    Filament::menu()->add(...$menuItems);
                }
            }
        }
    }

    /**
     * Convert file path to class name.
     */
    protected function getClassFromFile($filePath)
    {
        $relativePath = str_replace(base_path(), '', $filePath);
        $relativePath = str_replace('/', '\\', $relativePath);
        $relativePath = str_replace('.php', '', $relativePath);
        return 'App' . str_replace('\\', '', $relativePath);
    }
}
