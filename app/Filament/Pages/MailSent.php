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
use Filament\Actions\ActionGroup;
use Filament\Pages\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Actions;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Forms\Components\MarkdownEditor;
use App\Models\EmailGateway;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendGlobalMail;

class MailSent extends Page implements HasTable
{
    use InteractsWithTable;

    public $mail;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    protected static string $view = 'mail-sent';

    protected static ?string $navigationGroup = 'Mail';

    protected static ?string $title = 'Sent';

    protected static ?int $navigationSort = 3;

    public function mount(): void
    {
        // Get the authenticated user
        $this->mail = GuestUserMail::where('type', 1)->orderBy('created_at', 'desc')->get();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(GuestUserMail::query()->where('type', 0)->orderBy('created_at', 'desc'))
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
            ])
            ->filters([])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
}
