<?php

namespace App\Filament\Resources\FaqResource\Pages;

use App\Filament\Resources\FaqResource;
use App\Models\Faq;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListFaqs extends ListRecords
{
    protected static string $resource = FaqResource::class;

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
                ->badge(Faq::query()->where('status', 1)->count()),
            'Inactive' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 0))
                ->badge(Faq::query()->where('status', 0)->count()),
        ];
    }
}
