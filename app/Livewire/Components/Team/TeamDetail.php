<?php

namespace App\Livewire\Components\Team;

use App\Models\Team;
use Livewire\Component;

class TeamDetail extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function placeholder()
    {
        return view('components.team.skeletonD');
    }

    public function render()
    {
        $team = Team::where('slug', $this->slug)->first();
        return view('components.team.team-detail', compact('team'))->layout('partials.app-layout');
    }
}
