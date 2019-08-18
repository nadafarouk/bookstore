<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\PasswordResetTokenRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Services\ResponseService;
use App\Services\User\Interfaces\UserServiceInterface;
use App\Constants\UserResponseConstant;


class UserController extends Controller
{
    protected $userService , $responseService;

    public function __construct(UserServiceInterface $userService, ResponseService $responseService)
    {
        $this->userService = $userService ;
        $this->responseService = $responseService ;
    }

    public function createUser(CreateUserRequest $request)
    {
        $this->userService->createUser($request['name'] , $request['email'] , $request['password']);

        return $this->responseService->generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_CREATED ,
            UserResponseConstant::USER_SUCCESS_CUSTOM_RESPONSES['user_created']);
    }

    public function activateUser(UserRequest $request, $activationToken)
    {
         $this->userService->activateUserAccount($activationToken);

         return $this->responseService->generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_OK,
        UserResponseConstant::USER_SUCCESS_CUSTOM_RESPONSES['user_activated']);
    }

    public function requestPasswordReset(PasswordResetTokenRequest $request)
    {
        $this->userService->sendPasswordReset($request['email']);

        return $this->responseService->generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_CREATED,
            UserResponseConstant::USER_SUCCESS_CUSTOM_RESPONSES['user_requested_password_reset']);

    }

    public function verifyPasswordResetToken(UserRequest $request, $passwordResetToken)
    {
        $passwordReset = $this->userService->verifyPasswordResetToken($passwordResetToken);

        return $this->responseService->generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_OK,
            $passwordReset);
    }

    public function resetPassword(UpdatePasswordRequest $request,$passwordResetToken){
        $this->userService->resetUserPassword($request['email'],$request['password'],$passwordResetToken);

        return $this->responseService->generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_OK,
            UserResponseConstant::USER_SUCCESS_CUSTOM_RESPONSES['user_password_reset_done']);
    }

}
