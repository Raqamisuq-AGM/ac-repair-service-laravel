<?php

namespace App\Filament\Pages;

use App\Mail\SendGlobalMail;
use Filament\Pages\Page;
use Filament\Forms\Components\MarkdownEditor;
use App\Models\EmailGateway;
use App\Models\GuestUserMail;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class MailCompose extends Page
{

    public $mail;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    protected static string $view = 'mail-compose';

    protected static ?string $navigationGroup = 'Mail';

    protected static ?string $title = 'Compose Mail';

    protected static ?int $navigationSort = 1;

    public function mount(): void
    {
        // Fill form state with existing data
        $this->form->fill([
            'name' => '',
            'email' => '',
            'subject' => '',
            'message' => '',
            'provider' => '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Compose Mail')
                    ->schema([
                        Select::make('provider')
                            ->options(EmailGateway::all()->pluck('name', 'name'))
                            ->label('Select Provider'),
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        TextInput::make('email')
                            ->label('To')
                            ->email()
                            ->required(),
                        TextInput::make('subject')
                            ->label('Subject')
                            ->required(),
                        MarkdownEditor::make('message')
                            ->label('Message')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDisk('uploads/editor')
                            ->fileAttachmentsVisibility('public')
                            ->required(),
                    ])->columns(1),
            ])->statePath('data');
    }

    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Send Mail')
                ->submit('save')
        ];
    }

    public function save(): void
    {
        // Validate the form data
        $this->validate([
            'data.name' => ['required'],
            'data.email' => ['required'],
            'data.subject' => ['required'],
            'data.message' => ['required'],
            'data.provider' => ['required'],
        ]);

        $mailProvider = EmailGateway::where('name', $this->data['provider'])->first();
        if ($mailProvider) {

            $mailConfig = [
                'driver' => 'smtp',
                'host' => $mailProvider->host,
                'port' => $mailProvider->port,
                'encryption' => $mailProvider->encryption,
                'username' => $mailProvider->username,
                'password' => $mailProvider->password,
                'from' => [
                    'address' => $mailProvider->from_address,
                    'name' => $mailProvider->from_name
                ]
            ];

            Config::set('mail', $mailConfig);

            try {
                Mail::to($this->data['email'])->send(new SendGlobalMail($this->data['subject'], $this->data['message']));

                $newMail = new GuestUserMail();
                $newMail->email = $this->data['email'];
                $newMail->name = $this->data['name'];
                $newMail->subject = $this->data['subject'];
                $newMail->message = $this->data['message'];
                $newMail->save();

                Notification::make()
                    ->title('Profile Updated Successfully')
                    ->success()
                    ->send();
            } catch (\Exception $e) {
                Notification::make()
                    ->title('Something went wrong. Please try again later.')
                    ->success()
                    ->send();
            }
        }
    }
}
