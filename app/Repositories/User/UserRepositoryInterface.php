<?php


namespace App\Repositories\User;


interface UserRepositoryInterface
{
    public function createUser($name,$email,$password,$activationToken);
    public function getUserByEmail($email);
    public function getUserById($id);
    public function getUserByActivationToken($activationToken);
    public function getPasswordResetByToken($passwordResetToken);
    public function createPasswordReset($email);
    public function activateUserAccount($user);
    public function updateUserPasswordByEmail($email,$password);
    public function revokeAccessToken($user);

}
