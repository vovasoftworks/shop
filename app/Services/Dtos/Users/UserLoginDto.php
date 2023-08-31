<?php

namespace App\Services\Dtos\Users;

use App\Http\Requests\Auth\UserLoginRequest;
use Spatie\LaravelData\Data;

class UserLoginDto extends Data
{
    public string $email;
    public string $password;

    public static function fromRequest(UserLoginRequest $request): self
    {
        return self::from([
            'email' => $request->getUserEmail(),
            'password' => $request->getUserPassword(),
        ]);
    }
}
