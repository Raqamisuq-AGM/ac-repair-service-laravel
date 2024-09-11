<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\Service;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListServices extends ListRecords
{
    protected static string $resource = ServiceResource::class;

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
            'Published' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 1))
                ->badge(Service::query()->where('status', 1)->count()),
            'Unpublished' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 0))
                ->badge(Service::query()->where('status', 0)->count()),
        ];
    }
}
