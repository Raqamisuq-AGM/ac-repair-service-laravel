<?php

namespace App\Livewire\Pages\Blog;

use Livewire\Component;

class BlogDetailsPage extends Component
{
    public function render()
    {
        return view('pages.blog.blog-details-page')->layout('partials.app-layout');
    }
}
