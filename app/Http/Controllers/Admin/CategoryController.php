<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //category method
    public function all()
    {
        return view('pages.category.index');
    }

    //category store method
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        Category::create([
            'category' => $request->category,
        ]);

        return redirect()->route('category.all')->with('success', 'Category created successfully!');
    }
}
