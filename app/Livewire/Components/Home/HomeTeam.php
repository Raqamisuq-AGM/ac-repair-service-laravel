<?php

namespace App\Livewire\Components\Home;

use App\Models\Team;
use Livewire\Component;

class HomeTeam extends Component
{
    public function placeholder()
    {
        return view('components.team.skeleton');
    }

    public function render()
    {
        $teams = Team::orderBy('id', 'desc')->limit(4)->get();
        return view('components.home.home-team', compact('teams'));
    }
}
