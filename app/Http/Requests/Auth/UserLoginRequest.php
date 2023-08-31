<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    private const EMAIL = 'email';
    private const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::EMAIL => [
                'required',
                'string',
            ],
            self::PASSWORD => [
                'required',
                'string'
            ]
        ];
    }

    public function getUserEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getUserPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
