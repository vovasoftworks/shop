<?php

namespace App\Repositories\Write\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    private function query(): Builder
    {
        return User::query();
    }

    public function create(array $user)
    {
        return $this->query()
            ->create($user);
    }

}
