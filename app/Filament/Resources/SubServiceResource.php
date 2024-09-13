<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubServiceResource\Pages;
use App\Filament\Resources\SubServiceResource\RelationManagers;
use App\Models\SubService;
use App\Models\Category;
use App\Models\Service;
use App\Models\SubCategory;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\RichEditor;

class SubServiceResource extends Resource
{
    protected static ?string $model = SubService::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3-bottom-left';

    protected static ?string $navigationGroup = 'Services';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Media & Content')
                    ->schema([
                        Select::make('service_id')
                            ->label('Select Parent Service')
                            ->options(Service::all()->pluck('title', 'id'))
                            ->required()
                            ->searchable(),
                        TextInput::make('title')
                            ->required()
                            ->label('Title')
                            ->validationAttribute('title')
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                function ($operation, $state, Forms\Set $set) {
                                    $set('slug', Str::slug($state));
                                }
                            ),
                        TextInput::make('slug')
                            ->required()
                            ->label('Slug')
                            ->unique(ignoreRecord: true, table: Service::class)
                            ->validationAttribute('slug'),
                        RichEditor::make('content')
                            ->required()
                            ->columnSpan(1)
                            ->fileAttachmentsDirectory('uploads/img')
                            ->validationAttribute('content'),
                    ])->columns(1),
                Section::make('Media & Content')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->disk('public')
                            ->directory('uploads/img'),
                        RichEditor::make('content')
                            ->required()
                            ->columnSpan(1)
                            ->fileAttachmentsDirectory('uploads/img')
                            ->validationAttribute('content'),
                    ])->columns(1),
                Section::make('Meta SEO')
                    ->schema([
                        TextInput::make('meta_title')
                            ->required()
                            ->label('Meta Title')
                            ->validationAttribute('meta title'),
                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->required()
                            ->columnSpan(1)
                            ->validationAttribute('meta description'),
                        TagsInput::make('meta_tags')
                            ->label('Meta Keywords')
                            ->separator(',')
                            ->reorderable()
                            ->required()
                            ->validationAttribute('keywords'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(SubService::query()->orderBy('service_id')->orderBy('id', 'desc'))
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->placeholder('N/A'),
                TextColumn::make('service.title')
                    ->label('Parent Service')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Sub Service Deleted Successfully'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->successNotificationTitle('Sub Services Deleted Successfully'),
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
            'index' => Pages\ListSubServices::route('/'),
            'create' => Pages\CreateSubService::route('/create'),
            'edit' => Pages\EditSubService::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return SubService::count();
    }
}
