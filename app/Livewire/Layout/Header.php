<?php

namespace App\Livewire\Layout;

use App\Models\Service;
use App\Models\SystemInfo;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $logo = SystemInfo::first()->value('logo');
        $systemShortInfo = SystemInfo::first();
        // Fetch services with sub-services
        $services = Service::with('subServices')->where('status', Service::STATUS_PUBLISHED)->get();
        return view('partials.header', compact('logo', 'systemShortInfo', 'services'));
    }
}
