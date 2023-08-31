<?php

namespace Database\Factories;

use Tests\Helpers\TestUserHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => TestUserHelper::FirstName,
            'last_name' => TestUserHelper::LastName,
            'email' => TestUserHelper::Email,
            'password' => Hash::make(TestUserHelper::Password),
        ];
    }
}
