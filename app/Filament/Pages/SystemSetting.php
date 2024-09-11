<?php

namespace App\Filament\Pages;

use App\Models\SystemInfo;
use Filament\Forms;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Support\Str;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Validation\Rule;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;

class SystemSetting extends Page
{
    public $systemInfo;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'system-setting';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'System Settings';

    protected static ?int $navigationSort = 6;

    public function mount(): void
    {
        $this->systemInfo = SystemInfo::find(1);

        // Fill form state with existing data
        $this->form->fill([
            'title' => $this->systemInfo->title ?? '',
            'slogan' => $this->systemInfo->slogan ?? '',
            'email' => $this->systemInfo->email ?? '',
            'address' => $this->systemInfo->address ?? '',
            'about' => $this->systemInfo->about ?? '',
            'phone' => $this->systemInfo->phone ?? '',
            'whatsapp' => $this->systemInfo->whatsapp ?? '',
            'portfolio' => $this->systemInfo->portfolio ?? '',
            'facebook' => $this->systemInfo->facebook ?? '',
            'instagram' => $this->systemInfo->instagram ?? '',
            'twitter' => $this->systemInfo->twitter ?? '',
            'linkedin' => $this->systemInfo->linkedin ?? '',
            'youtube' => $this->systemInfo->youtube ?? '',
            'dribble' => $this->systemInfo->dribble ?? '',
            'github' => $this->systemInfo->github ?? '',
            'tiktok' => $this->systemInfo->tiktok ?? '',
            'wechat' => $this->systemInfo->wechat ?? '',
            'telegram' => $this->systemInfo->telegram ?? '',
            'skype' => $this->systemInfo->skype ?? '',
            'tumblr' => $this->systemInfo->tumblr ?? '',
            'medium' => $this->systemInfo->medium ?? '',
            'twitch' => $this->systemInfo->twitch ?? '',
            'threads' => $this->systemInfo->threads ?? '',
            'discord' => $this->systemInfo->discord ?? '',
            'meta_title' => $this->systemInfo->meta_title ?? '',
            'meta_description' => $this->systemInfo->meta_description ?? '',
            'meta_tags' => $this->systemInfo->meta_tags ?? '',
            'og_thumbnail' => $this->systemInfo->og_thumbnail ?? '',
            'logo' => $this->systemInfo->logo ?? '',
            'favicon' => $this->systemInfo->favicon ?? '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Logo & Favicon')->schema([
                    FileUpload::make('logo')
                        ->disk('public')
                        ->directory('uploads/img')
                        ->visibility('public')
                        ->columnSpan(1)
                        ->optimize('webp')
                        ->resize(50),
                    FileUpload::make('favicon')
                        ->disk('public')
                        ->directory('uploads/img')
                        ->visibility('public')
                        ->columnSpan(1)
                        ->optimize('webp')
                        ->resize(50),
                ])->columns(2),
                Section::make('Basic')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->label('Title')
                            ->validationAttribute('title'),
                        TextInput::make('slogan')
                            ->required()
                            ->label('Slogan')
                            ->validationAttribute('slogan'),
                        TextInput::make('address')
                            ->required()
                            ->label('Address')
                            ->columnSpan(2)
                            ->validationAttribute('address'),
                        Textarea::make('about')
                            ->label('About')
                            ->required()
                            ->columnSpan(2)
                            ->validationAttribute('about'),
                    ])->columns(2),
                Section::make('Contact & Social Information')
                    ->schema([
                        TextInput::make('email')
                            ->tel()
                            ->label('Email')
                            ->validationAttribute('email'),
                        TextInput::make('phone')
                            ->tel()
                            ->label('Phone')
                            ->validationAttribute('phone'),
                        TextInput::make('whatsapp')
                            ->tel()
                            ->label('Whatsapp')
                            ->validationAttribute('whatsapp'),
                        TextInput::make('portfolio')
                            ->url()
                            ->label('Portfolio')
                            ->validationAttribute('portfolio'),
                        TextInput::make('facebook')
                            ->url()
                            ->label('Facebook')
                            ->validationAttribute('facebook'),
                        TextInput::make('instagram')
                            ->url()
                            ->label('Instagram')
                            ->validationAttribute('instagram'),
                        TextInput::make('twitter')
                            ->url()
                            ->label('Twitter')
                            ->validationAttribute('twitter'),
                        TextInput::make('linkedin')
                            ->url()
                            ->label('Linkedin')
                            ->validationAttribute('linkedin'),
                        TextInput::make('youtube')
                            ->url()
                            ->label('Youtube')
                            ->validationAttribute('youtube'),
                        TextInput::make('dribble')
                            ->url()
                            ->label('Dribble')
                            ->validationAttribute('dribble'),
                        TextInput::make('github')
                            ->url()
                            ->label('Github')
                            ->validationAttribute('github'),
                        TextInput::make('tiktok')
                            ->url()
                            ->label('Tiktok')
                            ->validationAttribute('tiktok'),
                        TextInput::make('wechat')
                            ->url()
                            ->label('WeChat')
                            ->validationAttribute('wechat'),
                        TextInput::make('telegram')
                            ->url()
                            ->label('Telegram')
                            ->validationAttribute('telegram'),
                        TextInput::make('skype')
                            ->url()
                            ->label('Skype')
                            ->validationAttribute('skype'),
                        TextInput::make('tumblr')
                            ->url()
                            ->label('Tumblr')
                            ->validationAttribute('tumblr'),
                        TextInput::make('medium')
                            ->url()
                            ->label('Medium')
                            ->validationAttribute('medium'),
                        TextInput::make('twitch')
                            ->url()
                            ->label('Twitch')
                            ->validationAttribute('twitch'),
                        TextInput::make('threads')
                            ->url()
                            ->label('Threads')
                            ->validationAttribute('threads'),
                        TextInput::make('discord')
                            ->url()
                            ->label('Discord')
                            ->validationAttribute('discord'),
                    ])->columns(2),
                Section::make('Meta Data (SEO)')
                    ->schema([
                        TextInput::make('meta_title')
                            ->required()
                            ->label('Meta Title')
                            ->validationAttribute('meta title')
                            ->columnSpan('full'),
                        TextArea::make('meta_description')
                            ->required()
                            ->label('Meta Description')
                            ->validationAttribute('meta description')
                            ->columnSpan('full'),
                        TagsInput::make('meta_tags')
                            ->label('Meta Keywords')
                            ->separator(',')
                            ->reorderable()
                            ->required()
                            ->validationAttribute('meta keywords')
                            ->columnSpan('full'),
                        FileUpload::make('og_thumbnail')
                            ->disk('public')
                            ->directory('uploads/img')
                            ->visibility('public')
                            ->columnSpan('full')
                            ->optimize('webp')
                            ->resize(50),
                    ])->columns(2),
            ])->statePath('data');
    }

    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save')
        ];
    }

    public function save(): void
    {
        // Validate the form data
        $this->validate([
            'data.title' => ['required'],
            'data.slogan' => ['required'],
            'data.meta_title' => ['required'],
            'data.meta_description' => ['required'],
            'data.meta_tags' => ['required'],
        ]);

        if (is_array($this->data['logo'])) {
            foreach ($this->data['logo'] as $logFile) {
                if ($logFile instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    try {
                        // Generate a new filename with current timestamp
                        $logoName = now()->format('YmdHis') . '-' . $logFile->getClientOriginalName();

                        // Move the file to 'uploads/img' directory
                        $logPath = $logFile->storeAs('uploads/img', $logoName, 'public');

                        // Update the user with the path of the uploaded file
                        $this->systemInfo->updateOrCreate([], [
                            'logo' => $logPath,
                        ]);

                        $logFile->delete();
                    } catch (\Exception $e) {
                        // Log any errors during file upload
                        Notification::make()
                            ->title('Error uploading logo')
                            ->success()
                            ->send();
                    }
                }
            }
        }

        if (is_array($this->data['favicon'])) {
            foreach ($this->data['favicon'] as $favFile) {
                if ($favFile instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    try {
                        // Generate a new filename with current timestamp
                        $favFileName = now()->format('YmdHis') . '-' . $favFile->getClientOriginalName();

                        // Move the file to 'uploads/img' directory
                        $favFilePath = $favFile->storeAs('uploads/img', $favFileName, 'public');

                        // Update the user with the path of the uploaded file
                        $this->systemInfo->updateOrCreate([], [
                            'favicon' => $favFilePath,
                        ]);

                        $favFile->delete();
                    } catch (\Exception $e) {
                        // Log any errors during file upload
                        Notification::make()
                            ->title('Error uploading favicon')
                            ->success()
                            ->send();
                    }
                }
            }
        }

        if (is_array($this->data['og_thumbnail'])) {
            foreach ($this->data['og_thumbnail'] as $file) {
                if ($file instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    try {
                        // Generate a new filename with current timestamp
                        $filename = now()->format('YmdHis') . '-' . $file->getClientOriginalName();

                        // Move the file to 'uploads/img' directory
                        $filePath = $file->storeAs('uploads/img', $filename, 'public');

                        // Update the user with the path of the uploaded file
                        $this->systemInfo->updateOrCreate([], [
                            'og_thumbnail' => $filePath,
                        ]);

                        $file->delete();
                    } catch (\Exception $e) {
                        // Log any errors during file upload
                        Notification::make()
                            ->title('Error uploading og_thumbnail')
                            ->success()
                            ->send();
                    }
                }
            }
        }

        // Update the related adminInfo (if exists, or create it if not)
        $this->systemInfo->updateOrCreate([], [
            'title' => $this->data['title'] ?? '',
            'slogan' => $this->data['slogan'] ?? '',
            'address' => $this->data['address'] ?? '',
            'about' => $this->data['about'] ?? '',
            'email' => $this->data['email'] ?? '',
            'phone' => $this->data['phone'] ?? '',
            'whatsapp' => $this->data['whatsapp'] ?? '',
            'portfolio' => $this->data['portfolio'] ?? '',
            'facebook' => $this->data['facebook'] ?? '',
            'instagram' => $this->data['instagram'] ?? '',
            'twitter' => $this->data['twitter'] ?? '',
            'linkedin' => $this->data['linkedin'] ?? '',
            'youtube' => $this->data['youtube'] ?? '',
            'dribble' => $this->data['dribble'] ?? '',
            'github' => $this->data['github'] ?? '',
            'tiktok' => $this->data['tiktok'] ?? '',
            'wechat' => $this->data['wechat'] ?? '',
            'telegram' => $this->data['telegram'] ?? '',
            'skype' => $this->data['skype'] ?? '',
            'tumblr' => $this->data['tumblr'] ?? '',
            'medium' => $this->data['medium'] ?? '',
            'twitch' => $this->data['twitch'] ?? '',
            'threads' => $this->data['threads'] ?? '',
            'discord' => $this->data['discord'] ?? '',
            'meta_title' => $this->data['meta_title'] ?? '',
            'meta_description' => $this->data['meta_description'] ?? '',
            'meta_tags' => $this->data['meta_tags'] ?? '',
        ]);

        Notification::make()
            ->title('System Info Updated Successfully')
            ->success()
            ->send();
    }
}
