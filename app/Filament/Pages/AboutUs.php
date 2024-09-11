<?php

namespace App\Filament\Pages;

use App\Models\AboutUs as ModelsAboutUs;
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
use Filament\Forms\Components\MarkdownEditor;

class AboutUs extends Page
{
    public $content;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-hashtag';

    protected static string $view = 'about-us';

    protected static ?string $title = 'About Us';

    public function mount(): void
    {

        $this->content = ModelsAboutUs::find(1);

        // Fill form state with existing data
        $this->form->fill([
            'content' => $this->content->content ?? '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('About Us')
                    ->schema([
                        MarkdownEditor::make('content')
                            ->label('About Us Content')
                            ->columnSpan(2)
                            ->validationAttribute('content'),
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
        // Update the user's basic information
        $this->content->update([
            'content' => $this->data['content'],
        ]);

        Notification::make()
            ->title('Content Updated Successfully')
            ->success()
            ->send();
    }
}
