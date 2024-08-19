<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //blog method
    public function all()
    {
        return view('pages.blog.index');
    }

    //blog create method
    public function create()
    {
        return view('pages.blog.create');
    }

    //blog edit method
    public function edit()
    {
        return view('pages.blog.edit');
    }

    //blog store method
    public function store(Request $request)
    {
        return view('pages.blog.edit');
    }

    //blog update method
    public function update(Request $request)
    {
        return view('pages.blog.edit');
    }

    //blog delete method
    public function delete(Request $request)
    {
        return view('pages.blog.edit');
    }
}
