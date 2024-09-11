<?php

namespace App\Livewire\Components\About;

use App\Models\AboutUs;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        $about = AboutUs::first();
        return view('components.about.about', compact('about'));
    }
}
