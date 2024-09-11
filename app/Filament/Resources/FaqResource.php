<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource\RelationManagers;
use App\Models\Faq;
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

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?int $navigationSort = 6;

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
                        TextInput::make('ques')
                            ->required()
                            ->label('Question')
                            ->columnSpan(2)
                            ->validationAttribute('ques'),
                        Textarea::make('ans')
                            ->label('Answer')
                            ->required()
                            ->columnSpan(2)
                            ->validationAttribute('ans'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Faq::query()->orderBy('id', 'desc'))
            ->columns([
                TextColumn::make('ques')
                    ->label('Question')
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
                    ->successNotificationTitle('Faq Deleted Successfully'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->successNotificationTitle('Faq Deleted Successfully'),
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return Faq::where('status', 1)->count();
    }
}
