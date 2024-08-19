<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //team method
    public function all()
    {
        return view('pages.team.index');
    }

    //team create method
    public function create()
    {
        return view('pages.team.create');
    }

    //team edit method
    public function edit()
    {
        return view('pages.team.edit');
    }

    //team store method
    public function store(Request $request)
    {
        return view('pages.team.edit');
    }

    //team update method
    public function update(Request $request)
    {
        return view('pages.team.edit');
    }

    //team delete method
    public function delete(Request $request)
    {
        return view('pages.team.edit');
    }
}
