<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomCode;
use App\Models\SystemImage;
use App\Models\SystemSeo;
use App\Models\SystemShortInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    //custom code method
    public function customCode()
    {
        $item = CustomCode::find(1);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        return view('pages.settings.custom-code', compact('item'));
    }

    //custom code update method
    public function customCodeUpdate(Request $request)
    {
        $item = CustomCode::find(1);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }

        $item->header = $request->input('header');
        $item->footer = $request->input('footer');
        $item->save();

        // return success message with toaster
        toastr()->success('Custom code updated successfully');
        return redirect()->back();
    }

    //change email method
    public function changeEmail()
    {
        return view('pages.settings.change-email');
    }

    //change email update method
    public function changeEmailUpdate(Request $request)
    {
        $request->validate([
            'old_email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (!Auth::user()->where('email', $value)->exists()) {
                        $fail('The old email does not match our records.');
                    }
                },
            ],
            'new_email' => 'required|email|unique:users,email,' . Auth::id(),
            'confirm_email' => 'required|email|same:new_email',
        ]);

        $user = Auth::user();
        $user->email = $request->input('new_email');
        $user->save();
        // return success message with toaster
        toastr()->success('Email updated successfully');
        return redirect()->back();
    }

    //change password method
    public function changePassword()
    {
        return view('pages.settings.change-password');
    }

    //change password update method
    public function changePasswordUpdate(Request $request)
    {

        $request->validate([
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('The old password does not match our records.');
                    }
                },
            ],
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
        $user = Auth::user();
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        // return success message with toaster
        toastr()->success('Email updated successfully');
        return redirect()->back();
    }

    //company method
    public function company()
    {
        $company = SystemShortInfo::find(1);
        $companySeo = SystemSeo::find(1);
        $systemLogo = SystemImage::where('type', 'logo')->first();
        $systemFavicon = SystemImage::where('type', 'favicon')->first();
        if ($company == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        return view('pages.settings.company', compact('company', 'systemLogo', 'systemFavicon', 'companySeo'));
    }

    //company update method
    public function companyUpdate(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'tagline' => 'required',
            'email' => 'required',
            'whatsapp' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_desc' => 'required',
            'meta_author' => 'required',
            // 'meta_og_thumb' => 'required',
        ]);

        $company = SystemShortInfo::find(1);
        if ($company == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }

        $company->company_name = $request->input('company_name');
        $company->tagline = $request->input('tagline');
        $company->email = $request->input('email');
        $company->whatsapp = $request->input('whatsapp');
        $company->phone = $request->input('phone');
        $company->address = $request->input('address');
        $company->save();

        $companySeo = SystemSeo::find(1);
        $companySeo->meta_title = $request->input('meta_title');
        $companySeo->meta_keyword = $request->input('meta_keyword');
        $companySeo->meta_desc = $request->input('meta_desc');
        $companySeo->meta_author = $request->input('meta_author');
        $companySeo->save();

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $systemLogo = SystemImage::where('type', 'logo')->first();
            if ($systemLogo == null) {
                toastr()->warning('Item not found');
                return redirect()->back();
            }
            $logoImg = $request->logo;
            $input['logoImg'] = time() . '.' . $logoImg->getClientOriginalExtension();
            $logoDestination = public_path('uploads/img');
            $img = Image::make($logoImg->getRealPath());
            $img->save($logoDestination . '/' . $input['logoImg'], 70);
            $systemLogo->file = 'uploads/img/' . $input['logoImg'];
            $systemLogo->save();
        }

        if ($request->hasFile('favicon')) {
            $systemFavicon = SystemImage::where('type', 'favicon')->first();
            if ($systemFavicon == null) {
                toastr()->warning('Item not found');
                return redirect()->back();
            }
            $faviconImg = $request->favicon;
            $input['faviconImg'] = time() . '.' . $faviconImg->getClientOriginalExtension();
            $faviconDestination = public_path('uploads/img');
            $imgFavicon = Image::make($faviconImg->getRealPath());
            $imgFavicon->save($faviconDestination . '/' . $input['faviconImg'], 70);
            $systemFavicon->file = 'uploads/img/' . $input['faviconImg'];
            $systemFavicon->save();
        }

        if ($request->hasFile('meta_og_thumb')) {
            $systemSeoImg = $request->meta_og_thumb;
            $input['systemSeoImg'] = time() . '.' . $systemSeoImg->getClientOriginalExtension();
            $systemSeoDestination = public_path('uploads/img');
            $seoImg = Image::make($systemSeoImg->getRealPath());
            $seoImg->save($systemSeoDestination . '/' . $input['systemSeoImg'], 70);
            $companySeo->file = 'uploads/img/' . $input['systemSeoImg'];
            $companySeo->save();
        }

        toastr()->success('Company info updated successfully');
        return redirect()->back();
    }

    //clear cache method
    public function clearCache()
    {
        Artisan::call('optimize:clear');

        //return success message
        toastr()->success('Cache cleared successfully');
        return redirect()->back();
    }
}
