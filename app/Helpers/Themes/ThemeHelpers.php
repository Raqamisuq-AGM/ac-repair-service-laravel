<?php

// Define the custom theme_asset() function
if (!function_exists('theme_asset')) {
    function theme_asset($path)
    {
        $themeName = config('theme.name'); // Get the active theme name from configuration
        $themePath = "themes/{$themeName}/assets";

        return asset("{$themePath}/{$path}");
    }
}


// Define the custom plugin_asset() function
if (!function_exists('plugin_asset')) {
    function plugin_asset($path, $pluginName)
    {
        $pluginsPath = "plugins/{$pluginName}/assets";

        if (is_dir($pluginsPath)) {
            return asset("/plugins/{$pluginName}/assets/{$path}");
        }

        return ''; // Return an empty string or a default asset URL if the plugin directory does not exist
    }
}


// Define the custom addon_asset() function
if (!function_exists('addon_asset')) {
    function addon_asset($path, $addOnName)
    {
        $addPOnsPath = "add_ons/{$addOnName}/assets";

        if (is_dir($addPOnsPath)) {
            return asset("add_ons/{$addOnName}/assets/{$path}");
        }

        return ''; // Return an empty string or a default asset URL if the plugin directory does not exist
    }
}


// Define the custom dashboard_theme_asset() function
if (!function_exists('dashboard_asset')) {
    function dashboard_asset($path)
    {
        return asset("backend/{$path}");
    }
}
