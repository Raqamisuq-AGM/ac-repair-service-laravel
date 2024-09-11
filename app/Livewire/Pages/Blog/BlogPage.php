<?php

namespace App\Livewire\Pages\Blog;

use Livewire\Component;

class BlogPage extends Component
{
    public function render()
    {
        return view('pages.blog.blog-page')->layout('partials.app-layout');
    }
}
