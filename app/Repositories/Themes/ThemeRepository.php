<?php

namespace App\Repositories\Themes;

use App\Exceptions\Theme\DirectoryAlreadyExistsException;
use App\Exceptions\Theme\ThemeAlreadyInstalledException;
use App\Exceptions\Theme\ThemeJsonFileNotFoundException;
use App\Exceptions\Theme\ThemeJsonInvalidException;
use App\Exceptions\Theme\ZipExtractionFailedException;
use App\Exceptions\Theme\ZipFileNotFoundException;
use App\Models\Theme;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use FilesystemIterator;
use Illuminate\Support\Facades\File;

class ThemeRepository implements ThemeInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Theme $themes)
    {
        $this->themes = $themes;
    }

    public function getAllTheme()
    {
        return $this->themes->all();
    }

    public function install($data)
    {
        // Define the base path where themes will be stored
        $baseExtractPath = base_path('rq_contents/themes/');

        // Path to the uploaded zip file
        // $zipPath = $data['theme_file']->store('temp'); // Store file temporarily
        $zipPath = storage_path('app/public/' . $data); // Full path to the stored zip file

        // Check if the zip file exists
        if (!file_exists($zipPath)) {
            throw new ZipFileNotFoundException('Zip file not found at path: ' . $zipPath);
        }

        // Define a temporary extraction path
        $tempExtractPath = $baseExtractPath . 'temp';
        if (!is_dir($tempExtractPath)) {
            mkdir($tempExtractPath, 0755, true);
        }

        // Extract the zip file to the temporary location
        $zip = new ZipArchive;
        if ($zip->open($zipPath) === TRUE) {
            if (!$zip->extractTo($tempExtractPath)) {
                $this->deleteDirectory($tempExtractPath);
                $this->cleanupTempFiles();
                throw new ZipExtractionFailedException('Failed to extract to path: ' . $tempExtractPath);
            }
            $zip->close();
        } else {
            $this->deleteDirectory($tempExtractPath);
            $this->cleanupTempFiles();
            throw new ZipExtractionFailedException('Failed to open zip file at: ' . $zipPath);
        }

        // Validate and get the theme name from theme.json
        $themeJsonPath = $tempExtractPath . '/theme.json';
        if (!file_exists($themeJsonPath)) {
            $this->deleteDirectory($tempExtractPath);
            $this->cleanupTempFiles();
            throw new ThemeJsonFileNotFoundException('theme.json file not found in the extracted content.');
        }

        $themeJson = json_decode(file_get_contents($themeJsonPath), true);
        if (!isset($themeJson['name']) || empty($themeJson['name'])) {
            $this->deleteDirectory($tempExtractPath);
            $this->cleanupTempFiles();
            throw new ThemeJsonInvalidException('Theme name is missing or empty in theme.json');
        }

        $themeName = $themeJson['name'];

        // Check if the theme is already installed
        $existingTheme = $this->themes->where('name', $themeName)->first();
        if ($existingTheme) {
            $this->deleteDirectory($tempExtractPath);
            $this->cleanupTempFiles();
            throw new ThemeAlreadyInstalledException('Theme is already installed: ' . $themeName);
        }

        // Define the final path where the theme will be stored
        $finalExtractPath = $baseExtractPath . $themeName;

        // Check if the directory for the theme already exists
        if (is_dir($finalExtractPath)) {
            $this->deleteDirectory($tempExtractPath);
            $this->cleanupTempFiles();
            throw new DirectoryAlreadyExistsException('Theme is already installed: ' . $finalExtractPath);
        }

        if ($zip->open($zipPath) === TRUE) {
            if (!$zip->extractTo($finalExtractPath)) {
                $this->deleteDirectory($finalExtractPath);
                $this->cleanupTempFiles();
                throw new ZipExtractionFailedException('Failed to extract to path: ' . $finalExtractPath);
            }
            $zip->close();
        } else {
            $this->deleteDirectory($finalExtractPath);
            $this->cleanupTempFiles();
            throw new ZipExtractionFailedException('Failed to open zip file at: ' . $zipPath);
        }

        // Create the theme record in the database
        $theme = $this->themes->create([
            'name' => $themeName,
            'status' => 'inactive',
            'verified' => 'unverified',
        ]);

        // Move the extracted files from the temp folder to the final theme directory
        $this->moveDirectory($tempExtractPath, $finalExtractPath);

        // Move the assets folder to public/themes/$theme->name/
        $assetsPath = $finalExtractPath . '/assets';
        if (is_dir($assetsPath)) {
            $destinationPath = public_path('themes/' . $themeName . '/assets');
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $this->moveDirectory($assetsPath, $destinationPath);
        }

        // Move the filament folder to app/Filament
        $filamentPath = $finalExtractPath . '/Filament';
        if (is_dir($filamentPath)) {
            $filamentDestinationPath = base_path('app/Filament');
            if (!is_dir($filamentDestinationPath)) {
                mkdir($filamentDestinationPath, 0755, true);
            }
            $this->moveDirectory($filamentPath, $filamentDestinationPath);
        }

        // Move the filament folder to app/Livewire
        $livewirePath = $finalExtractPath . '/Livewire';
        if (is_dir($livewirePath)) {
            $livewireDestinationPath = base_path('app/Livewire');
            if (!is_dir($livewireDestinationPath)) {
                mkdir($livewireDestinationPath, 0755, true);
            }
            $this->moveDirectory($livewirePath, $livewireDestinationPath);
        }

        // Clean up the temporary extraction folder
        $this->deleteDirectory($tempExtractPath);

        if ($theme) {
            $this->cleanupTempFiles();
        }

        return $theme;
    }

    private function moveDirectory($source, $destination)
    {
        // Ensure the destination directory exists
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        // Use RecursiveIteratorIterator to traverse the directory
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($iterator as $item) {
            // Generate the new path for the item
            $destPath = $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName();

            // Handle directory creation
            if ($item->isDir()) {
                if (!is_dir($destPath)) {
                    mkdir($destPath, 0755, true);
                }
            } else {
                // Handle file copying
                $sourcePath = $item->getPathname();

                // Ensure the destination directory exists before copying files
                $destDir = dirname($destPath);
                if (!is_dir($destDir)) {
                    mkdir($destDir, 0755, true);
                }
            }
        }

        // Optionally clean up the source directory
        $this->deleteDirectory($source);
    }


    private function deleteDirectory($dir)
    {
        if (!is_dir($dir)) return;
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->deleteDirectory("$dir/$file") : unlink("$dir/$file");
        }
        rmdir($dir);
    }

    public function activate($id)
    {
        // Set all themes to inactive
        $this->themes->query()->update(['status' => 0]);

        // Activate the selected theme
        $item = $this->themes->find($id);
        $item->status = 'active';
        $item->save();
        return $item;
    }

    public function delete($id)
    {
        // Find the theme by ID
        $item = $this->themes->find($id);

        // Check if the theme is the default one
        if ($item->name == 'Default') {
            throw new \App\Exceptions\Theme\DefaultThemeCanNotBeDeleted();
        }

        // Define paths for theme directories
        $themePath = base_path("rq_contents/themes/{$item->name}");
        $publicThemePath = public_path("themes/{$item->name}");

        // Define filament paths for theme directories
        $filamentResourcePath = base_path("app/Filament/Resources/{$item->name}");
        $filamentPagePath = base_path("app/Filament/Pages/{$item->name}");
        $filamentViewPath = base_path("app/Filament/Views/{$item->name}");
        $filamentWidgetPath = base_path("app/Filament/Widgets/{$item->name}");

        // Delete theme directories if they exist
        if (is_dir($themePath)) {
            $this->deleteExistingDirectory($themePath);
        }

        if (is_dir($publicThemePath)) {
            $this->deleteExistingDirectory($publicThemePath);
        }

        // Delete filament directories if they exist
        if (is_dir($filamentResourcePath)) {
            $this->deleteExistingDirectory($filamentResourcePath);
        }

        if (is_dir($filamentPagePath)) {
            $this->deleteExistingDirectory($filamentPagePath);
        }

        if (is_dir($filamentViewPath)) {
            $this->deleteExistingDirectory($filamentViewPath);
        }

        if (is_dir($filamentWidgetPath)) {
            $this->deleteExistingDirectory($filamentWidgetPath);
        }

        // Delete the theme record from the database
        $item->delete();

        return $item;
    }

    private function deleteExistingDirectory($dir)
    {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), ['.', '..']);

        foreach ($files as $file) {
            $path = "$dir/$file";
            (is_dir($path)) ? $this->deleteDirectory($path) : unlink($path);
        }

        rmdir($dir);
    }

    protected function cleanupTempFiles()
    {
        $tempPath = storage_path('app/temp');
        $tempPath2 = storage_path('app/public/tmp');

        if (File::isDirectory($tempPath)) {
            File::cleanDirectory($tempPath); // This will delete all files in the directory
        }

        if (File::isDirectory($tempPath2)) {
            File::cleanDirectory($tempPath2); // This will delete all files in the directory
        }
    }

    public function verifyTheme($themeCode) {}
}
