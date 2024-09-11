<?php

namespace App\Filament\Widgets;

use App\Models\UserTraffic;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use Carbon\Carbon;

class LatestTraffics extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(UserTraffic::query()->orderBy('created_at', 'desc')->take(10))
            ->columns([
                TextColumn::make('visited_page')
                    ->label('Visited Page')
                    ->searchable(),
                TextColumn::make('ip')
                    ->label('IP')
                    ->searchable(),
                TextColumn::make('country')
                    ->label('Country')
                    ->searchable(),
                TextColumn::make('city')
                    ->label('City')
                    ->searchable(),
                TextColumn::make('state')
                    ->label('State')
                    ->searchable(),
                TextColumn::make('zip_code')
                    ->label('Zip Code')
                    ->searchable(),
                TextColumn::make('platform')
                    ->label('Platform')
                    ->searchable(),
                TextColumn::make('device')
                    ->label('Device')
                    ->searchable(),
                TextColumn::make('browser')
                    ->label('Browser')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Date/Time')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d/m/y h:i A')),
            ]);
    }
}
