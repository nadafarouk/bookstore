<?php


namespace App\Services\User;


use App\Repositories\User\UserRepositoryInterface;
use Carbon\Carbon;

class UserService implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser($name,$email,$password){
        $activationToken = str_random(100);
        $password = bcrypt($password);
        return $this->userRepository->createUser($name,$email,$password,$activationToken);
    }

    public function createToken($user){

    }
    public function authenticateUser($email,$password){
        return $this->userRepository->authenticateUser($email,$password);
    }

    public function getUserByEmail($email)
    {
        return $this->userRepository->getUserByEmail($email);
    }

    public function getUserByActivationToken($token){
        return $this->userRepository->getUserByActivationToken($token);
    }

    public function activateUserAccount($user)
    {
        return $this->userRepository->activateUserAccount($user);
    }

    public function createPasswordReset($email){
        return $this->userRepository->createPasswordReset($email);
    }

    public function verifyPasswordResetToken($token)
    {
        return $this->userRepository->getPasswordResetByToken($token);
    }

    public function updateUserPassword($user,$password)
    {
        return $this->userRepository->updateUserPassword($user,$password);
    }


}
