<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\user\CreateTokenRequest;
use App\Http\Requests\user\CreateUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService=$userService;
    }

    public function createUser(CreateUserRequest $request){
        return $this->userService->createUser($request['name'],$request['email'],$request['password']);
    }

    public function verifyUser($token)
    {
        return $this->userService->activateUserAccount($token);
    }

    public function requestPasswordReset(Request $request)
    {
        return $this->userService->sendPasswordReset($request['email']);
    }

    public function verifyPasswordResetToken($token)
    {
        return $this->userService->verifyPasswordResetToken($token);
    }

    public function resetPassword(Request $request,$token){
        return $this->userService->resetUserPassword($request['email'],$request['password'],$token);
    }

}
