<?php

namespace App\Livewire\Components\Blog;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;

class Blog extends Component
{
    public function placeholder()
    {
        return view('components.blog.skeleton');
    }

    public function render()
    {
        $blogs = ModelsBlog::paginate(10);
        return view('components.blog.blog', compact('blogs'));
    }
}
