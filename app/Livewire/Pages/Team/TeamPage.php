<?php

namespace App\Livewire\Pages\Team;

use Livewire\Component;

class TeamPage extends Component
{
    public function render()
    {
        return view('pages.team.team-page')->layout('partials.app-layout');
    }
}
