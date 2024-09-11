<?php

namespace App\Livewire\Components\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogDetail extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function placeholder()
    {
        return view('components.blog.skeletonD');
    }

    public function render()
    {
        $blog = Blog::where('slug', $this->slug)->first();
        $blogs = Blog::get();
        return view('components.blog.blog-detail', compact('blog', 'blogs'))->layout('partials.app-layout');
    }
}
