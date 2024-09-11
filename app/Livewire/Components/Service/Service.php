<?php

namespace App\Livewire\Components\Service;

use App\Models\Service as ModelsService;
use Livewire\Component;
use Livewire\WithPagination;

class Service extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('components.service.skeleton');
    }

    public function render()
    {
        $services = ModelsService::paginate(10);
        return view('components.service.service', compact('services'));
    }
}
