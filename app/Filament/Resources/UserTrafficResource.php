<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserTrafficResource\Pages;
use App\Filament\Resources\UserTrafficResource\RelationManagers;
use App\Models\UserTraffic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Carbon\Carbon;

class UserTrafficResource extends Resource
{
    protected static ?string $model = UserTraffic::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';

    protected static ?string $navigationLabel = 'Traffics';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordAction(null)
            ->recordUrl(null)
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
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserTraffic::route('/'),
            'create' => Pages\CreateUserTraffic::route('/create'),
            'edit' => Pages\EditUserTraffic::route('/{record}/edit'),
        ];
    }
}
