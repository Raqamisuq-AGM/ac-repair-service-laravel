<?php

namespace App\Livewire\Components\Team;

use App\Models\Team as ModelsTeam;
use Livewire\Component;

class Team extends Component
{
    public function placeholder()
    {
        return view('components.team.skeleton');
    }

    public function render()
    {
        $teams = ModelsTeam::paginate(10);
        return view('components.team.team', compact('teams'));
    }
}
