<?php

namespace App\Http\Controllers\Admin\Plugin;

use App\Exceptions\Plugin\DirectoryAlreadyExistsException;
use App\Exceptions\Plugin\PluginAlreadyInstalledException;
use App\Exceptions\Plugin\PluginJsonFileNotFoundException;
use App\Exceptions\Plugin\PluginJsonInvalidException;
use App\Exceptions\Plugin\ZipExtractionFailedException;
use App\Exceptions\Plugin\ZipFileNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Plugins;
use App\Services\Plugins\PluginService;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function __construct(public PluginService $pluginService)
    {
        $this->pluginService  = $pluginService;
    }

    public function checkThemeVerification($id)
    {
        $theme = Plugins::findOrFail($id);
        return response()->json([
            'verified' => $theme->verified,
            'csrfToken' => csrf_token(),
        ]);
    }

    public function all()
    {
        $items = $this->pluginService->getAllPlugins();
        return view('admin.pages.plugins.index', compact('items'));
    }

    public function install(Request $request)
    {
        try {
            $request->validate([
                'plugin_file' => 'required|file|mimes:zip'
            ]);
            $this->pluginService->installPlugin($request->all());

            toastr()->success('Plugin installed successfully.');
            return redirect()->route('plugins.all');
        } catch (\Illuminate\Validation\ValidationException $e) {
            toastr()->error('Invalid file type. Only zip files are allowed.');
            return redirect()->route('plugins.all');
        } catch (PluginAlreadyInstalledException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('plugins.all');
        } catch (ZipFileNotFoundException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('plugins.all');
        } catch (DirectoryAlreadyExistsException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('plugins.all');
        } catch (ZipExtractionFailedException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('plugins.all');
        } catch (PluginJsonInvalidException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (PluginJsonFileNotFoundException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (\Exception $e) {
            toastr()->error('An unexpected error occurred.');
            return redirect()->route('plugins.all');
        }
    }

    public function activate($id)
    {
        $this->pluginService->activatePlugin($id);
        toastr()->success('Plugin activated successfully');
        return redirect()->route('plugins.all');
    }

    public function deactivate($id)
    {
        $this->pluginService->deactivatePlugin($id);
        toastr()->success('Plugin deactivated successfully');
        return redirect()->route('plugins.all');
    }

    public function delete($id)
    {
        $this->pluginService->deletePlugin($id);
        toastr()->success('Plugin deleted successfully.');
        return redirect()->route('plugins.all');
    }
}
