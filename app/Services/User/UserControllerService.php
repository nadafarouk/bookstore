<?php


namespace App\Services\User;


use App\Exceptions\User\InvalidUserToken;
use App\Exceptions\User\UserNotCreatedException;
use App\Mail\WelcomeUserEmail;
use Illuminate\Auth\AuthenticationException;
use App\Mail\ConfirmUserEmail;

class UserControllerService implements UserServiceInterface
{
    protected $userService , $mailService;
    public function __construct(UserServiceInterface $userService,MailService $mailService)
    {
        $this->userService=$userService;
        $this->mailService=$mailService;
    }

    public function createUser($name,$email,$password){
        if($user=$this->userService->createUser($name,$email,$password))
        {
            $this->mailService->sendUserMail($user, new ConfirmUserEmail($user));
            return $user;
        }
        throw new UserNotCreatedException ;
    }

    public function activateUserAccount($token){
        if($user = $this->userService->getUserByActivationToken($token))
        {
            $this->userService->activateUserAccount($user);
            return $this->mailService->sendUserMail($user, new WelcomeUserEmail());

        }
        throw new InvalidUserToken ;
    }




}