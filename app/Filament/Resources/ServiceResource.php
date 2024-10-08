<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
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

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationGroup = 'Services';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic')
                    ->schema([
                        Select::make('status')
                            ->options([
                                0 => 'Unpublished',
                                1 => 'Published',
                            ])
                            ->required()
                            ->label('Status')
                            ->columnSpan(2)
                            ->default(1)
                            ->validationAttribute('status'),
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
                        Textarea::make('short_description')
                            ->label('Short Description')
                            ->required()
                            ->columnSpan(2)
                            ->validationAttribute('short description'),
                    ])->columns(2),
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
            ->query(Service::query()->orderBy('id', 'desc'))
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail'),
                TextColumn::make('title')
                    ->label('Title')
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
                        0 => 'Unpublished',
                        1 => 'Published',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Service Deleted Successfully'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->successNotificationTitle('Services Deleted Successfully'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return Service::where('status', 1)->count();
    }
}
