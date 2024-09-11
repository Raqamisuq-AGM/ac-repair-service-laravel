<?php

namespace App\Livewire\Components\Home;

use App\Models\Service;
use Livewire\Component;

class HomeService extends Component
{
    public function placeholder()
    {
        return view('components.service.skeleton');
    }

    public function render()
    {
        $services = Service::orderBy('id', 'desc')->limit(3)->get();
        return view('components.home.home-service', compact('services'));
    }
}
