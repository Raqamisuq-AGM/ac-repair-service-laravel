<?php

namespace App\Filament\Pages;

use App\Models\Admin;
use App\Models\CustomHeaderFooterCode as ModelsCustomHeaderFooterCode;
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

class CustomHeaderFooterCode extends Page
{
    public $customCode;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';

    protected static string $view = 'custom-header-footer-code';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'Custom Header Footer Code';

    protected static ?int $navigationSort = 4;

    public function mount(): void
    {

        $this->customCode = ModelsCustomHeaderFooterCode::find(1);

        // Fill form state with existing data
        $this->form->fill([
            'header_code' => $this->customCode->header_code ?? '',
            'footer_code' => $this->customCode->footer_code ?? '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Custom Header Footer Code')
                    ->schema([
                        TextArea::make('header_code')
                            ->label('Header Code')
                            ->columnSpan(2)
                            ->validationAttribute('header code'),
                        TextArea::make('footer_code')
                            ->label('Footer Code')
                            ->columnSpan(2)
                            ->validationAttribute('footer code'),
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
        $this->customCode->update([
            'header_code' => $this->data['header_code'],
            'footer_code' => $this->data['footer_code'],
        ]);

        Notification::make()
            ->title('Code Updated Successfully')
            ->success()
            ->send();
    }
}
