<?php

namespace App\Livewire\Components\Home;

use App\Models\SystemInfo;
use Livewire\Component;

class HomeAbout extends Component
{
    public function render()
    {
        $systemInfo = SystemInfo::first();
        return view('components.home.home-about', compact('systemInfo'));
    }
}
