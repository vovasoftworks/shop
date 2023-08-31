<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Services\Actions\Users\UserRegisterAction;
use App\Services\Dtos\Users\UserRegistrationDto;
use Illuminate\Http\JsonResponse;

class UserRegisterController extends Controller
{
    public function __invoke(
        UserRegisterRequest $request, UserRegisterAction $userRegisterAction
    ): JsonResponse {
        $dto = UserRegistrationDto::fromRequest($request);

        $userRegisterAction->run($dto);

        return response()->json("User registered successfully");
    }
}
