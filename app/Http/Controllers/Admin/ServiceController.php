<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //service method
    public function all()
    {
        return view('pages.service.index');
    }

    //service create method
    public function create()
    {
        return view('pages.service.create');
    }

    //service edit method
    public function edit()
    {
        return view('pages.service.edit');
    }

    //service store method
    public function store(Request $request)
    {
        return view('pages.service.edit');
    }

    //service update method
    public function update(Request $request)
    {
        return view('pages.service.edit');
    }

    //service delete method
    public function delete(Request $request)
    {
        return view('pages.service.edit');
    }
}
