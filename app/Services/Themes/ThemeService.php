<?php

namespace App\Services\Themes;

use App\Repositories\Themes\ThemeInterface;
use App\Exceptions\Theme\ThemeAlreadyInstalledException;
use App\Exceptions\Theme\ZipFileNotFoundException;
use App\Exceptions\Theme\DirectoryAlreadyExistsException;
use App\Exceptions\Theme\ZipExtractionFailedException;
use App\Exceptions\Theme\DefaultThemeCanNotBeDeleted;
use App\Exceptions\Theme\MissingRequiredFilesException;
use App\Exceptions\Theme\ThemeJsonNotFoundException;
use App\Exceptions\Theme\InvalidThemeJsonException;
use App\Exceptions\Theme\ThemeJsonFileNotFoundException;
use App\Exceptions\Theme\ThemeJsonInvalidException;

class ThemeService
{
    public function __construct(public ThemeInterface $themeRepo)
    {
        $this->themeRepo = $themeRepo;
    }

    public function getAllThemes()
    {
        return $this->themeRepo->getAllTheme();
    }

    public function installTheme($data)
    {
        try {
            $this->themeRepo->install($data);
            return ['status' => 'success', 'message' => 'Theme installed successfully.'];
        } catch (ThemeAlreadyInstalledException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (ZipFileNotFoundException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (DirectoryAlreadyExistsException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (ZipExtractionFailedException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (DefaultThemeCanNotBeDeleted $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (MissingRequiredFilesException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (ThemeJsonNotFoundException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (InvalidThemeJsonException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (ThemeJsonFileNotFoundException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (ThemeJsonInvalidException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'An unexpected error occurred: ' . $e->getMessage()
            ];
        }
    }

    public function activateTheme($id)
    {
        try {
            $this->themeRepo->activate($id);
            return ['status' => 'success', 'message' => 'Theme activated successfully.'];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'An unexpected error occurred: ' . $e->getMessage()
            ];
        }
    }

    public function deleteTheme($id)
    {
        try {
            $this->themeRepo->delete($id);
            return ['status' => 'success', 'message' => 'Theme deleted successfully.'];
        } catch (DefaultThemeCanNotBeDeleted $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function verifyTheme($themeCode)
    {
        return ['status' => 'error', 'message' => 'Invalid license code.'];
    }
}
