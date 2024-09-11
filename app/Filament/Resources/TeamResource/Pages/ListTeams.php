<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Filament\Resources\TeamResource;
use App\Models\Team;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTeams extends ListRecords
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'Active' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 1))
                ->badge(Team::query()->where('status', 1)->count()),
            'Inactive' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 0))
                ->badge(Team::query()->where('status', 0)->count()),
        ];
    }
}
