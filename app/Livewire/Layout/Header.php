<?php

namespace App\Livewire\Layout;

use App\Models\SystemInfo;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $logo = SystemInfo::first()->value('logo');
        $systemShortInfo = SystemInfo::first();
        return view('partials.header', compact('logo', 'systemShortInfo'));
    }
}
