<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    //contact us mail method
    public function all()
    {
        return view('pages.traffic.index');
    }
}
