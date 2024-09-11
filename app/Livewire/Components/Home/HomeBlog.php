<?php

namespace App\Livewire\Components\Home;

use App\Models\Blog;
use Livewire\Component;

class HomeBlog extends Component
{
    public function placeholder()
    {
        return view('components.blog.skeleton');
    }

    public function render()
    {
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        return view('components.home.home-blog', compact('blogs'));
    }
}
