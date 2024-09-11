<?php

namespace App\Filament\Pages;

use App\Models\GuestUserMail;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Forms\Components\TextInput;
use Filament\Actions;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Forms\Components\MarkdownEditor;
use App\Models\EmailGateway;
use Filament\Forms\Components\Select;

class MailInbox extends Page implements HasTable
{
    use InteractsWithTable;

    public $mail;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static string $view = 'mail-inbox';

    protected static ?string $navigationGroup = 'Mail';

    protected static ?string $title = 'Inbox';

    protected static ?int $navigationSort = 2;

    public function mount(): void
    {
        // Get the authenticated user
        $this->mail = GuestUserMail::where('type', 1)->orderBy('created_at', 'desc')->get();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(GuestUserMail::query()->where('type', 1)->orderBy('created_at', 'desc'))
            ->recordAction(null)
            ->recordUrl(null)
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
                ToggleColumn::make('status')->label('Mark as read')
            ])
            ->filters([
                SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        1 => 'Read',
                        0 => 'Unread',
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->infolist([
                        Section::make('Mail Details')
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('email'),
                                TextEntry::make('phone'),
                                TextEntry::make('subject')->columnSpan(3),
                                TextEntry::make('message')->columnSpan(3),
                            ])->columns(3)
                    ]),
                Tables\Actions\Action::make('reply')
                    ->label('Reply')
                    ->icon('heroicon-o-paper-airplane')
                    ->url('mail-compose'),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Compose Email')
                ->url('mail-compose'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return GuestUserMail::where('status', 0)->where('type', 1)->count();
    }
}
