<?php


namespace App\Constants;


class UserResponseConstant extends HttpResponseConstant
{

    const USER_SUCCESS_CUSTOM_RESPONSE_MESSAGES = [

        'USER_CREATED' => 'user created successfully' ,
        'USER_ACTIVATED' => 'user activated successfully',
        'PASSWORD_RESET_REQUESTED' => 'password reset mail will be sent',
        'PASSWORD_RESET_DONE' => 'password was changed successfully'
    ];

    const USER_EXCEPTION_CUSTOM_RESPONSE_CODES = [
        'USER_NOT_CREATED' => self::HTTP_STATUS_ERROR_NOT_FOUND,
        'INVALID_TOKEN' => self::HTTP_STATUS_ERROR_FORBIDDEN,
        'USER_NOT_FOUND' => self::HTTP_STATUS_ERROR_NOT_FOUND,
    ];

    const USER_EXCEPTION_CUSTOM_RESPONSE_MESSAGES = [
        'USER_NOT_CREATED' => 'user was not created',
        'INVALID_TOKEN' => 'token is invalid',
        'USER_NOT_FOUND' => 'user was not found',
    ];

}