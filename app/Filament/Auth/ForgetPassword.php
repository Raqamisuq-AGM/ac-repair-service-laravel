<?php

namespace App\Filament\Auth;

use App\Mail\ForgetPasswordMail;
use App\Models\Admin;
use App\Models\EmailGateway;
use Filament\Pages\Auth\PasswordReset\RequestPasswordReset;
use Filament\Actions\Action;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Session;

class ForgetPassword extends RequestPasswordReset
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getForgetPasswordFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getForgetPasswordFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Email Address')
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus();
    }

    protected function getFormActions(): array
    {
        return [
            $this->getForgetPasswordRequestFormAction(),
        ];
    }

    protected function getForgetPasswordRequestFormAction(): Action
    {
        return Action::make('request')
            ->label('Send Email')
            ->submit('request');
    }

    public function request(): void
    {
        $data = $this->form->getState();
        $admin = Admin::where('email', $data['email'])->first();
        if ($admin) {
            $emailProvider = EmailGateway::count();
            if ($emailProvider > 0) {
                $defaultEmailProvider = EmailGateway::where('is_default', 1)->first();
                if ($defaultEmailProvider) {

                    $mailConfig = [
                        'driver' => $defaultEmailProvider->driver,
                        'host' => $defaultEmailProvider->host,
                        'port' => $defaultEmailProvider->port,
                        'encryption' => $defaultEmailProvider->encryption,
                        'username' => $defaultEmailProvider->username,
                        'password' => $defaultEmailProvider->password,
                        'from' => [
                            'address' => $defaultEmailProvider->from_address,
                            'name' => $defaultEmailProvider->from_name
                        ]
                    ];
                    Config::set('mail', $mailConfig);
                    $generateOtp = mt_rand(1000, 9999);
                    Session::put('userEmail', $data['email']);
                    Session::put('userOtp', $generateOtp);
                    Mail::to($data['email'])->send(new ForgetPasswordMail($admin->name, $generateOtp));

                    redirect()->route('forget.password.otp', ['type' => 'admin']);

                    // Notification::make()
                    //     ->title('Please check your email inbox')
                    //     ->success()
                    //     ->send();
                } else {
                    Notification::make()
                        ->title('No default email gateway provider found')
                        ->danger()
                        ->send();
                }
            } else {
                Notification::make()
                    ->title('No email gateway provider found')
                    ->danger()
                    ->send();
            }
        } else {
            Notification::make()
                ->title('Email address not found')
                ->danger()
                ->send();
        }
    }
}
