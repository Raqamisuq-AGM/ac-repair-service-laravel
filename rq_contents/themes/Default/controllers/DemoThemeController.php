<?php

namespace ThemeController\DemoThemeController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemoThemeController extends Controller
{
    public function index()
    {
        toastr()->success('Your account has been suspended.');
        return view('index');
    }
}
