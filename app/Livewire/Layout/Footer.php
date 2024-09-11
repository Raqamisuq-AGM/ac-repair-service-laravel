<?php

namespace App\Livewire\Layout;

use App\Models\Blog;
use App\Models\SystemInfo;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $systemLogo = SystemInfo::first();
        $systemShortInfo = SystemInfo::first();
        $blogs = Blog::orderBy('id', 'desc')->limit(2)->get();
        return view('partials.footer', compact('systemLogo', 'systemShortInfo', 'blogs'));
    }
}
