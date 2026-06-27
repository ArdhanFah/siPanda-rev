<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Register as BaseRegister;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterOtpMail;
use Filament\Auth\Http\Responses\Contracts\RegistrationResponse;
use Filament\Schemas\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class CustomRegister extends BaseRegister
{
    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label(__('filament-panels::auth/pages/register.form.email.label'))
            ->email()
            ->required()
            ->maxLength(255)
            ->rules([
                fn () => function (string $attribute, mixed $value, \Closure $fail) {
                    if (User::where('email', $value)->exists()) {
                        $fail('Email ini sudah terdaftar. Silakan masuk atau gunakan email lain.');
                    }
                }
            ]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label(__('filament-panels::auth/pages/register.form.password.label'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required()
            ->rule(Password::min(8)->letters()->numbers())
            ->showAllValidationMessages()
            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
            ->same('passwordConfirmation')
            ->validationAttribute(__('filament-panels::auth/pages/register.form.password.validation_attribute'))
            ->validationMessages([
                'min' => 'Password harus minimal 8 karakter.',
                'letters' => 'Password harus mengandung setidaknya satu huruf.',
                'numbers' => 'Password harus mengandung setidaknya satu angka.',
            ]);
    }

    protected function onValidationError(\Illuminate\Validation\ValidationException $exception): void
    {
        $errors = $exception->validator->errors()->toArray();

        foreach ($errors as $field => $messages) {
            foreach ($messages as $message) {
                $customMessage = $message;

                // Map raw translation keys or specific messages to friendly Indonesian messages
                if ($message === 'validation.password.letters') {
                    $customMessage = 'Password harus mengandung setidaknya satu huruf.';
                } elseif ($message === 'validation.password.numbers') {
                    $customMessage = 'Password harus mengandung setidaknya satu angka.';
                } elseif ($message === 'validation.password.min') {
                    $customMessage = 'Password harus minimal 8 karakter.';
                } elseif (str_contains($message, 'validation.password')) {
                    $customMessage = 'Password harus minimal 8 karakter dan mengandung kombinasi huruf dan angka.';
                }

                Notification::make()
                    ->title('Pendaftaran Gagal')
                    ->body($customMessage)
                    ->danger()
                    ->persistent()
                    ->send();
            }
        }

        throw $exception;
    }

    public function register(): ?RegistrationResponse
    {
        $data = $this->form->getState();
        
        \Illuminate\Support\Facades\Log::info('Registration attempt:', $data);

        $otp = rand(100000, 999999);
        $cacheData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'otp' => $otp
        ];

        // Simpan data di cache selama 10 menit
        Cache::put('otp_reg_' . $data['email'], $cacheData, now()->addMinutes(10));
        
        // Simpan di session untuk keperluan resend
        session(['reg_email' => $data['email'], 'reg_name' => $data['name']]);

        try {
            // Kirim Email
            Mail::to($data['email'])->send(new RegisterOtpMail($otp));
            \Illuminate\Support\Facades\Log::info('OTP sent to: ' . $data['email']);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Mail failed: ' . $e->getMessage());
        }

        $this->redirect(route('register.otp', ['email' => $data['email']]));

        return null;
    }
}
