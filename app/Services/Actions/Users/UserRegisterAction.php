<?php

namespace App\Services\Actions\Users;

use App\Models\User;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use App\Services\Dtos\Users\UserRegistrationDto;

class UserRegisterAction
{
    protected UserWriteRepositoryInterface $userWriteRepository;

    public function __construct(UserWriteRepositoryInterface $userWriteRepository)
    {
        $this->userWriteRepository = $userWriteRepository;
    }

    public function run(UserRegistrationDto $dto)
    {
        $user = User::createModel($dto);

        return $this->userWriteRepository->create($user);
    }
}
