<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\RelationManagers;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Filters\SelectFilter;


class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 5;

    protected static bool $shouldRegisterNavigation = false;

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
                        TextInput::make('name')
                            ->required()
                            ->label('Name')
                            ->validationAttribute('name')
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                function ($operation, $state, Forms\Set $set) {
                                    $set('slug', Str::slug($state));
                                }
                            ),
                        TextInput::make('slug')
                            ->required()
                            ->label('Slug')
                            ->unique(ignoreRecord: true, table: Team::class)
                            ->validationAttribute('slug'),
                        TextInput::make('position')
                            ->required()
                            ->label('Position')
                            ->columnSpan(2)
                            ->validationAttribute('position'),
                        Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->columnSpan(2)
                            ->validationAttribute('description'),
                    ])->columns(2),
                Section::make('Avatar')
                    ->schema([
                        FileUpload::make('photo')
                            ->required()
                            ->disk('public')
                            ->directory('uploads/img')
                            ->optimize('webp')
                            ->resize(50),
                    ])->columns(1),
                Section::make('Social')
                    ->schema([
                        TextInput::make('fb')
                            ->required()
                            ->url()
                            ->label('Facebook')
                            ->validationAttribute('fb'),
                        TextInput::make('twitter')
                            ->required()
                            ->url()
                            ->label('Twitter')
                            ->validationAttribute('twitter'),
                        TextInput::make('instagram')
                            ->required()
                            ->url()
                            ->label('Instagram')
                            ->validationAttribute('instagram'),
                        TextInput::make('whatsapp')
                            ->required()
                            ->tel()
                            ->label('Whatsapp')
                            ->validationAttribute('whatsapp'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Team::query()->orderBy('id', 'desc'))
            ->columns([
                ImageColumn::make('photo')
                    ->label('Avatar'),
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('position')
                    ->label('Position')
                    ->searchable()
                    ->sortable(),
                CheckboxColumn::make('status')
                    ->label('Published')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        0 => 'Inactive',
                        1 => 'Active',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Team Deleted Successfully'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->successNotificationTitle('Team Deleted Successfully'),
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return Team::where('status', 1)->count();
    }
}
