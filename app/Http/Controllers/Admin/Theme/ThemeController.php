<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Exceptions\Theme\DefaultThemeCanNotBeDeleted;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Themes\ThemeService;
use App\Exceptions\Theme\ThemeAlreadyInstalledException;
use App\Exceptions\Theme\ZipFileNotFoundException;
use App\Exceptions\Theme\DirectoryAlreadyExistsException;
use App\Exceptions\Theme\ThemeJsonFileNotFoundException;
use App\Exceptions\Theme\ThemeJsonInvalidException;
use App\Exceptions\Theme\ZipExtractionFailedException;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function __construct(public ThemeService $themeService)
    {
        $this->themeService  = $themeService;
    }

    public function checkThemeVerification($id)
    {
        $theme = Theme::findOrFail($id);
        return response()->json([
            'verified' => $theme->verified,
            'csrfToken' => csrf_token(),
        ]);
    }

    public function all()
    {
        $items = $this->themeService->getAllThemes();
        return view('admin.pages.themes.index', compact('items'));
    }

    public function install(Request $request)
    {
        try {
            $request->validate([
                'theme_file' => 'required|file|mimes:zip'
            ]);
            $this->themeService->installTheme($request->all());

            toastr()->success('Theme installed successfully.');
            return redirect()->route('themes.all');
        } catch (\Illuminate\Validation\ValidationException $e) {
            toastr()->error('Invalid file type. Only zip files are allowed.');
            return redirect()->route('themes.all');
        } catch (ThemeAlreadyInstalledException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('themes.all');
        } catch (ZipFileNotFoundException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('themes.all');
        } catch (DirectoryAlreadyExistsException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('themes.all');
        } catch (ZipExtractionFailedException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('themes.all');
        } catch (ThemeJsonInvalidException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (ThemeJsonFileNotFoundException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (\Exception $e) {
            toastr()->error('An unexpected error occurred.');
            return redirect()->route('themes.all');
        }
    }


    public function activate($id)
    {
        $this->themeService->activateTheme($id);
        toastr()->success('Theme activated successfully');
        return redirect()->route('themes.all');
    }

    public function delete($id)
    {
        try {
            $this->themeService->deleteTheme($id);
            toastr()->success('Theme deleted successfully.');
            return redirect()->route('themes.all');
        } catch (DefaultThemeCanNotBeDeleted $e) {
            toastr()->success('Default Theme Can Not Be Deleted');
            return redirect()->route('themes.all');
        }
    }
}
