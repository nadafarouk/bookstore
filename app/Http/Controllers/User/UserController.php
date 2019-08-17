<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\PasswordResetTokenRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Services\User\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function createUser(CreateUserRequest $request){
        return $this->userService->createUser($request['name'] , $request['email'] , $request['password']);
    }

    public function activateUser(UserRequest $request, $activationToken)
    {
        return $this->userService->activateUserAccount($activationToken);
    }

    public function requestPasswordReset(PasswordResetTokenRequest $request)
    {
        return $this->userService->sendPasswordReset($request['email']);
    }

    public function verifyPasswordResetToken(UserRequest $request, $passwordResetToken)
    {
        return $this->userService->verifyPasswordResetToken($passwordResetToken);
    }

    public function resetPassword(UpdatePasswordRequest $request,$passwordResetToken){
        return $this->userService->resetUserPassword($request['email'],$request['password'],$passwordResetToken);
    }

}
