<?php

namespace App\Http\Controllers\Admin\AddOn;

use App\Exceptions\AddOn\AddOnAlreadyInstalledException;
use App\Exceptions\AddOn\AddOnJsonFileNotFoundException;
use App\Exceptions\AddOn\AddOnJsonInvalidException;
use App\Exceptions\AddOn\DirectoryAlreadyExistsException;
use App\Exceptions\AddOn\ZipExtractionFailedException;
use App\Exceptions\AddOn\ZipFileNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\AddOns;
use App\Services\Add_ons\AddOnService;
use Illuminate\Http\Request;

class AddOnController extends Controller
{
    public function __construct(public AddOnService $addOnService)
    {
        $this->addOnService  = $addOnService;
    }

    public function checkThemeVerification($id)
    {
        $theme = AddOns::findOrFail($id);
        return response()->json([
            'verified' => $theme->verified,
            'csrfToken' => csrf_token(),
        ]);
    }

    public function all()
    {
        $items = $this->addOnService->getAllAddOns();
        return view('admin.pages.add_ons.index', compact('items'));
    }

    public function install(Request $request)
    {
        try {
            $request->validate([
                'add_on_file' => 'required|file|mimes:zip'
            ]);
            $this->addOnService->installAddOn($request->all());

            toastr()->success('AddOn installed successfully.');
            return redirect()->route('add_ons.all');
        } catch (\Illuminate\Validation\ValidationException $e) {
            toastr()->error('Invalid file type. Only zip files are allowed.');
            return redirect()->route('add_ons.all');
        } catch (AddOnAlreadyInstalledException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (ZipFileNotFoundException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (DirectoryAlreadyExistsException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (ZipExtractionFailedException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (AddOnJsonInvalidException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (AddOnJsonFileNotFoundException $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('add_ons.all');
        } catch (\Exception $e) {
            toastr()->error('An unexpected error occurred.');
            return redirect()->route('add_ons.all');
        }
    }

    public function activate($id)
    {
        $this->addOnService->activateAddOn($id);
        toastr()->success('AddOn activated successfully');
        return redirect()->route('add_ons.all');
    }

    public function deactivate($id)
    {
        $this->addOnService->deactivateAddOn($id);
        toastr()->success('AddOn deactivated successfully');
        return redirect()->route('add_ons.all');
    }

    public function delete($id)
    {
        $this->addOnService->deleteAddOn($id);
        toastr()->success('AddOn deleted successfully.');
        return redirect()->route('add_ons.all');
    }
}
