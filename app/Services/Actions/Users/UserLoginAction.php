<?php

namespace App\Services\Actions\Users;

use App\Services\Dtos\Users\UserLoginDto;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Http;

class UserLoginAction
{
    /**
     * @throws AuthorizationException
     */
    public function run(UserLoginDto $dto)
    {
        $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
            'client_secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
            'username' => $dto->email,
            'password' => $dto->password,
            'scope' => '*',
        ]);

        $data = json_decode($response->getBody()->getContents());

        if (property_exists($data, 'errors')) {
            throw new AuthorizationException();
        }

        return $data;
    }
}
