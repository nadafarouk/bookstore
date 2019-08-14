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

}
