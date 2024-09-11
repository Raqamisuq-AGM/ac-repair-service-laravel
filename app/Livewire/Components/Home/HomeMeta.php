<?php

namespace App\Livewire\Components\Home;

use App\Models\SystemInfo;
use Livewire\Component;

class HomeMeta extends Component
{
    public $title;

    public function mount($title = null)
    {
        $this->title = $title;
    }

    public function render()
    {
        $systemInfo = SystemInfo::first();
        return view('components.home.home-meta', compact('systemInfo'));
    }
}
