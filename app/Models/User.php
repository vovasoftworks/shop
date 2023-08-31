<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use App\Services\Dtos\Users\UserRegistrationDto;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property int $parent_id
 */

class User extends Authenticatable implements AuthenticatableContract, AuthorizableContract
{
    use HasFactory, Notifiable, HasApiTokens, \Illuminate\Auth\Authenticatable, Authorizable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
    ];

    public static function createModel(UserRegistrationDto $dto): array
    {
        return [
            'first_name' => $dto->firstName,
            'last_name' => $dto->lastName,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
        ];
    }

    public function validateForPassportPasswordGrant($password): bool
    {
        return true;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'owner_id', 'id');
    }
}
