<?php

namespace App\Filament\Pages;

use App\Models\Admin;
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

class MyProfile extends Page implements HasForms
{
    use InteractsWithForms;

    public Admin $user;
    public ?array $data = [];
    public ?string $avatar = null;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $view = 'my-profile';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'My Profile';

    protected static ?int $navigationSort = 1;

    public function mount(): void
    {
        // Get the authenticated user
        $this->user = Filament::getCurrentPanel()->auth()->user();
        $admin = Admin::with('adminInfo')->find($this->user->id);

        // Fill form state with existing data
        $this->form->fill([
            'name' => $admin->name,
            'slug' => $admin->slug,
            'address' => $admin->adminInfo->address ?? '',
            'about' => $admin->adminInfo->about ?? '',
            'phone' => $admin->adminInfo->phone ?? '',
            'whatsapp' => $admin->adminInfo->whatsapp ?? '',
            'portfolio' => $admin->adminInfo->portfolio ?? '',
            'facebook' => $admin->adminInfo->facebook ?? '',
            'instagram' => $admin->adminInfo->instagram ?? '',
            'twitter' => $admin->adminInfo->twitter ?? '',
            'linkedin' => $admin->adminInfo->linkedin ?? '',
            'youtube' => $admin->adminInfo->youtube ?? '',
            'dribble' => $admin->adminInfo->dribble ?? '',
            'github' => $admin->adminInfo->github ?? '',
            'tiktok' => $admin->adminInfo->tiktok ?? '',
            'wechat' => $admin->adminInfo->wechat ?? '',
            'telegram' => $admin->adminInfo->telegram ?? '',
            'skype' => $admin->adminInfo->skype ?? '',
            'tumblr' => $admin->adminInfo->tumblr ?? '',
            'medium' => $admin->adminInfo->medium ?? '',
            'twitch' => $admin->adminInfo->twitch ?? '',
            'threads' => $admin->adminInfo->threads ?? '',
            'discord' => $admin->adminInfo->discord ?? '',
            'avatar' => $admin->adminInfo->avatar ?? '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Avatar')->schema([
                    FileUpload::make('avatar')
                        ->disk('public')
                        ->directory('uploads/img')
                        ->visibility('public')
                        ->avatar()
                        ->columnSpan(1)
                        ->optimize('webp')
                        ->resize(50)
                ])->columns(4),
                Section::make('Basic')
                    ->schema([
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
                            ->unique(ignoreRecord: true, table: Admin::class)
                            ->validationAttribute('slug'),
                        TextInput::make('address')
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
                        TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->label('Phone')
                            ->validationAttribute('phone'),
                        TextInput::make('whatsapp')
                            ->tel()
                            ->required()
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
            'data.name' => ['required', 'string', 'max:255'],
            'data.phone' => ['required', 'string'],
            'data.whatsapp' => ['required', 'string'],
        ]);

        // Update the user's basic information
        $this->user->update([
            'name' => $this->data['name'],
            'slug' => $this->data['slug'],
        ]);

        if (is_array($this->data['avatar'])) {
            foreach ($this->data['avatar'] as $file) {
                if ($file instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    try {
                        // Generate a new filename with current timestamp
                        $filename = now()->format('YmdHis') . '-' . $file->getClientOriginalName();

                        // Move the file to 'uploads/img' directory
                        $filePath = $file->storeAs('uploads/img', $filename, 'public');

                        // Update the user with the path of the uploaded file
                        $this->user->adminInfo()->updateOrCreate([], [
                            'avatar' => $filePath,
                        ]);

                        $file->delete();
                    } catch (\Exception $e) {
                        // Log any errors during file upload
                        Notification::make()
                            ->title('Error uploading avatar')
                            ->success()
                            ->send();
                    }
                }
            }
        }

        // Update the related adminInfo (if exists, or create it if not)
        $this->user->adminInfo()->updateOrCreate([], [
            'address' => $this->data['address'] ?? '',
            'about' => $this->data['about'] ?? '',
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
        ]);

        Notification::make()
            ->title('Profile Updated Successfully')
            ->success()
            ->send();
    }
}
