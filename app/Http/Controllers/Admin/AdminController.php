<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsMail;
use App\Models\UserTraffic;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //dashboard method
    public function dashboard()
    {
        $trafficCount = UserTraffic::count();
        $unreadMailCount = ContactUsMail::where('status', 'unread')->count();
        $traffics = UserTraffic::orderBy('id', 'desc')->limit(10)->get();
        $unreadMails = ContactUsMail::where('status', 'unread')->orderBy('id', 'desc')->limit(10)->get();
        return view('index', compact('trafficCount', 'unreadMailCount', 'traffics', 'unreadMails'));
    }
}
