<?php


namespace App\Services\User\Interfaces;


interface UserServiceInterface
{
    public function createUser($name,$email,$password);
    public function activateUserAccount($activationToken);
    public function sendPasswordReset($email);
    public function verifyPasswordResetToken($passwordResetToken);
    public function resetUserPassword($email,$password,$passwordResetToken);
    public function revokeAccessToken($user);

}
