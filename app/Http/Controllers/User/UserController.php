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
    protected $userService ;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService ;
    }

    public function createUser(CreateUserRequest $request)
    {
        $this->userService->createUser($request['name'] , $request['email'] , $request['password']);

        return ResponseService::generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_CREATED ,
            UserResponseConstant::USER_SUCCESS_CUSTOM_RESPONSE_MESSAGES['USER_CREATED']);
    }

    public function activateUser(UserRequest $request, $activationToken)
    {
         $this->userService->activateUserAccount($activationToken);

         return ResponseService::generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_OK,
        UserResponseConstant::USER_SUCCESS_CUSTOM_RESPONSE_MESSAGES['USER_ACTIVATED']);
    }

    public function requestPasswordReset(PasswordResetTokenRequest $request)
    {
        $this->userService->sendPasswordReset($request['email']);

        return ResponseService::generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_CREATED,
            UserResponseConstant::USER_SUCCESS_CUSTOM_RESPONSE_MESSAGES['PASSWORD_RESET_REQUESTED']);

    }

    public function verifyPasswordResetToken(UserRequest $request, $passwordResetToken)
    {
        $passwordReset = $this->userService->verifyPasswordResetToken($passwordResetToken);

        return ResponseService::generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_OK,
            $passwordReset);
    }

    public function resetPassword(UpdatePasswordRequest $request,$passwordResetToken){
        $this->userService->resetUserPassword($request['email'],$request['password'],$passwordResetToken);

        return ResponseService::generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_OK,
            UserResponseConstant::USER_SUCCESS_CUSTOM_RESPONSE_MESSAGES['PASSWORD_RESET_DONE']);
    }

    public function revokeAccessToken(UserRequest $request){
        $this->userService->revokeAccessToken($request->user());
        return ResponseService::generateSuccessResponse(UserResponseConstant::HTTP_STATUS_SUCCESS_OK,
            UserResponseConstant::USER_SUCCESS_CUSTOM_RESPONSE_MESSAGES['USER_LOGGED_OUT']);
}

}
