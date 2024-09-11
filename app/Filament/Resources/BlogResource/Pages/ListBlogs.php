<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use App\Models\Blog;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListBlogs extends ListRecords
{
    protected static string $resource = BlogResource::class;

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
                ->badge(Blog::query()->where('status', 1)->count()),
            'Unpublished' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 0))
                ->badge(Blog::query()->where('status', 0)->count()),
        ];
    }
}
