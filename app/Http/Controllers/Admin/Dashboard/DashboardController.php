<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //index method
    public function index()
    {
        return view('admin.index');
    }
}
