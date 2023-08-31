<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    private const FIRST_NAME = 'first_name';
    private const LAST_NAME = 'last_name';
    private const EMAIL = 'email';
    private const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::FIRST_NAME => [
                'required',
                'string',
            ],
            self::LAST_NAME => [
                'required',
                'string',
            ],
            self::EMAIL => [
                'required',
                'string',
                'unique:users',
            ],
            self::PASSWORD => [
                'required',
                'string',
                'min:8',
            ]
        ];
    }

    public function getUserFirstName(): string
    {
        return $this->get(self::FIRST_NAME);
    }

    public function getUserLastName(): string
    {
        return $this->get(self::LAST_NAME);
    }

    public function getUserEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getUserPassword(): string
    {
        return $this->get(self::LAST_NAME);
    }

}
