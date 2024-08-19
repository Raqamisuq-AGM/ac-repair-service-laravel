<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    //custom code method
    public function customCode()
    {
        return view('pages.settings.custom-code');
    }

    //custom code update method
    public function customCodeUpdate()
    {
        return view('pages.settings.custom-code');
    }

    //change email method
    public function changeEmail()
    {
        return view('pages.settings.change-email');
    }

    //change email update method
    public function changeEmailUpdate()
    {
        return view('pages.settings.change-email');
    }

    //change password method
    public function changePassword()
    {
        return view('pages.settings.change-password');
    }

    //change password update method
    public function changePasswordUpdate()
    {
        return view('pages.settings.change-password');
    }

    //company method
    public function company()
    {
        return view('pages.settings.company');
    }

    //company update method
    public function companyUpdate()
    {
        return view('pages.settings.company');
    }

    //clear cache method
    public function clearCache()
    {
        Artisan::call('optimize:clear');

        //return success message with tostr
        session()->flash('toast_success', 'All caches cleared successfully');
        return redirect()->back();
    }
}
