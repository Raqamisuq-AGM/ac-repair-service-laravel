<?php

namespace App\Filament\Widgets;

use App\Models\GuestUserMail;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;

class UnreadMails extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?string $pollingInterval = '10s';

    public function table(Table $table): Table
    {
        return $table
            ->query(GuestUserMail::query()->where('status', 0)->take(10))
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),
                CheckboxColumn::make('status')
            ]);
    }
}
