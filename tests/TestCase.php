<?php

namespace Tests;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public Collection $user;

    public function authorization(): void
    {
        $this->user = User::factory()->create();
        Passport::actingAs($this->user);
    }
}
