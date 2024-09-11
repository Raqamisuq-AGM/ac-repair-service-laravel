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

class ChangeEmail extends Page
{
    use InteractsWithForms;

    public Admin $user;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static string $view = 'change-email';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'Change Email';

    protected static ?int $navigationSort = 2;

    public function mount(): void
    {
        // Get the authenticated user
        $this->user = Filament::getCurrentPanel()->auth()->user();
        $admin = Admin::find($this->user->id);

        // Fill form state with existing data
        $this->form->fill([
            'old_email' => '',
            'new_email' => '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Update Email')
                    ->schema([
                        TextInput::make('old_email')
                            ->label('Old Email')
                            ->required()
                            ->email()
                            ->columnSpan(2)
                            ->validationAttribute('old email'),
                        TextInput::make('new_email')
                            ->label('New Email')
                            ->email()
                            ->required()
                            ->columnSpan(2)
                            ->validationAttribute('new email'),
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
            'data.old_email' => [
                'required',
                'email',
                Rule::in([$this->user->email]),
            ],
            'data.new_email' => ['required', 'email', Rule::unique('admins', 'email')->ignore($this->user->id)],
        ]);

        // Update the user's email
        $this->user->update([
            'email' => $this->data['new_email'],
        ]);

        Notification::make()
            ->title('Email Updated Successfully')
            ->success()
            ->send();
    }
}
