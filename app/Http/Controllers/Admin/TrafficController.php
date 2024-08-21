<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserTraffic;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    //contact us mail method
    public function all()
    {
        $items = UserTraffic::latest()->paginate(15);
        return view('pages.traffic.index', compact('items'));
    }
}
