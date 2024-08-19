<?php

// Install the theme
if (!function_exists('installTheme')) {
    function installTheme()
    {
        echo 'install theme';
    }
}

// Theme views directory
if (!function_exists('themeView')) {
    function themeView($file)
    {
        return config('theme.view') . '.' . $file;
    }
}

// Theme assets directory
if (!function_exists('themeAsset')) {
    function themeAsset($file)
    {
        return config('theme.asset')  . '/' . $file;
    }
}

// Active or Inactive theme
if (!function_exists('ChangeTheme')) {
    function ChangeTheme($themeName, $status) {}
}

// Delete theme
if (!function_exists('deleteTheme')) {
    function deleteTheme($themeName) {}
}
