<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Services\Actions\Users\UserLoginAction;
use App\Services\Dtos\Users\UserLoginDto;
use Illuminate\Auth\Access\AuthorizationException;
use stdClass;

class UserLoginController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function __invoke(
        UserLoginRequest $request, UserLoginAction $userLoginAction
    ) {
        $dto = UserLoginDto::fromRequest($request);

        return $userLoginAction->run($dto);
    }

}
