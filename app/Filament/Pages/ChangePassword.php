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

class ChangePassword extends Page
{
    use InteractsWithForms;

    public Admin $user;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static string $view = 'change-password';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'Change Password';

    protected static ?int $navigationSort = 3;

    public function mount(): void
    {
        // Get the authenticated user
        $this->user = Filament::getCurrentPanel()->auth()->user();
        $admin = Admin::find($this->user->id);

        // Fill form state with existing data
        $this->form->fill([
            'old_password' => '',
            'new_password' => '',
            'confirm_password' => '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Update Password')
                    ->schema([
                        TextInput::make('old_password')
                            ->label('Old Password')
                            // ->password()
                            ->required()
                            ->columnSpan(2)
                            ->validationAttribute('old password'),
                        TextInput::make('new_password')
                            ->label('New Password')
                            // ->password()
                            ->required()
                            ->minLength(8)
                            ->columnSpan(2)
                            ->validationAttribute('new password'),
                        TextInput::make('confirm_password')
                            ->label('Confirm Password')
                            // ->password()
                            ->required()
                            ->columnSpan(2)
                            ->validationAttribute('confirm password'),
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
            'data.old_password' => ['required', 'string'],
            'data.new_password' => ['required', 'string', 'min:8'],
            'data.confirm_password' => ['required', 'string', 'same:data.new_password'],
        ]);

        // Check if the old password is correct
        if (!Hash::check($this->data['old_password'], $this->user->password)) {
            Notification::make()
                ->danger()
                ->title('Old password is incorrect.')
                ->send();
            return;
        }

        // Update the user's password
        $this->user->update([
            'password' => Hash::make($this->data['new_password']),
        ]);

        // Update the user's basic information
        $this->user->update([
            'password' => $this->data['password'] ?? $this->user->password, // Only update password if changed
        ]);

        Notification::make()
            ->title('Password Updated Successfully')
            ->success()
            ->send();
    }
}
