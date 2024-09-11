<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailGatewayResource\Pages;
use App\Filament\Resources\EmailGatewayResource\RelationManagers;
use App\Models\EmailGateway;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Facades\DB;

class EmailGatewayResource extends Resource
{
    protected static ?string $model = EmailGateway::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Gateways';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic')
                    ->schema([
                        Select::make('status')
                            ->options([
                                0 => 'Inactive',
                                1 => 'Active',
                            ])
                            ->required()
                            ->label('Status')
                            ->columnSpan(2)
                            ->default(1)
                            ->validationAttribute('status'),
                        Select::make('is_default')
                            ->options([
                                0 => 'No',
                                1 => 'Yes',
                            ])
                            ->required()
                            ->label('Is Default')
                            ->columnSpan(2)
                            ->default(0)
                            ->validationAttribute('is_default'),
                        TextInput::make('driver')
                            ->required()
                            ->label('driver')
                            ->validationAttribute('driver')
                            ->columnSpan(2),
                        TextInput::make('name')
                            ->required()
                            ->label('Provider Name')
                            ->unique(ignoreRecord: true, table: EmailGateway::class)
                            ->validationAttribute('provider name')
                            ->columnSpan(2),
                        TextInput::make('host')
                            ->required()
                            ->label('host')
                            ->validationAttribute('host')
                            ->columnSpan(2),
                        TextInput::make('port')
                            ->required()
                            ->label('Port')
                            ->validationAttribute('port')
                            ->columnSpan(2),
                        TextInput::make('username')
                            ->required()
                            ->label('User Name')
                            ->validationAttribute('username')
                            ->columnSpan(2),
                        TextInput::make('password')
                            ->required()
                            ->label('Password')
                            ->validationAttribute('password')
                            ->columnSpan(2),
                        TextInput::make('encryption')
                            ->required()
                            ->label('Encryption')
                            ->validationAttribute('encryption')
                            ->columnSpan(2),
                        TextInput::make('from_name')
                            ->required()
                            ->label('From Name')
                            ->validationAttribute('from_name')
                            ->columnSpan(2),
                        TextInput::make('from_address')
                            ->required()
                            ->label('From Address')
                            ->validationAttribute('from_address')
                            ->columnSpan(2),
                        FileUpload::make('thumbnail')
                            ->required()
                            ->disk('public')
                            ->directory('uploads/img')
                            ->columnSpan(2),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail'),
                TextColumn::make('name')
                    ->label('Provider')
                    ->searchable()
                    ->sortable(),
                ToggleColumn::make('is_default'),
                ToggleColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListEmailGateways::route('/'),
            'create' => Pages\CreateEmailGateway::route('/create'),
            'edit' => Pages\EditEmailGateway::route('/{record}/edit'),
        ];
    }
}
