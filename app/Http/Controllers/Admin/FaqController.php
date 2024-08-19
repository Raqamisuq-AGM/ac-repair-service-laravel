<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //faq method
    public function all()
    {
        return view('pages.faq.index');
    }

    //faq create method
    public function create()
    {
        return view('pages.faq.create');
    }

    //faq edit method
    public function edit()
    {
        return view('pages.faq.edit');
    }

    //faq store method
    public function store(Request $request)
    {
        return view('pages.faq.edit');
    }

    //faq update method
    public function update(Request $request)
    {
        return view('pages.faq.edit');
    }

    //faq delete method
    public function delete(Request $request)
    {
        return view('pages.faq.edit');
    }
}
