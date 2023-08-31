<?php

namespace App\Services\Dtos\Users;

use App\Http\Requests\Auth\UserRegisterRequest;
use Spatie\LaravelData\Data;

class UserRegistrationDto extends Data
{
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $password;

    public static function fromRequest(UserRegisterRequest $request): self
    {
        return self::from([
            'firstName' => $request->getUserFirstName(),
            'lastName' => $request->getUserLastName(),
            'email' => $request->getUserEmail(),
            'password' => $request->getUserPassword(),
        ]);
    }
}
