<?php


namespace App\Constants;


class UserResponseConstant extends HttpResponseConstant
{

    const USER_SUCCESS_CUSTOM_RESPONSES = [

        'user_created' => 'user created successfully' ,
        'user_activated' => 'user activated successfully',
        'user_requested_password_reset' => 'password reset mail will be sent',
        'user_password_reset_done' => 'password was changed successfully'
    ];
}