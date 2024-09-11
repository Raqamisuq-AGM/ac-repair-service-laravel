<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;

class HomePage extends Component
{
    public $title = 'Home';

    public function render()
    {
        return view('home-page')->layout('partials.app-layout');
    }
}
