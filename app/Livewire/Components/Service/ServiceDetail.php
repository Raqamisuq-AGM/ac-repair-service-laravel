<?php

namespace App\Livewire\Components\Service;

use App\Models\Service;
use App\Models\SystemInfo;
use Livewire\Component;

class ServiceDetail extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function placeholder()
    {
        return view('components.service.skeletonD');
    }

    public function render()
    {
        $service = Service::where('slug', $this->slug)->first();
        $systemInfo = SystemInfo::first();
        return view('components.service.service-detail', compact('service', 'systemInfo'))->layout('partials.app-layout');
    }
}
