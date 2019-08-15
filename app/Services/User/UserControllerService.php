<?php


namespace App\Services\User;


use App\Exceptions\User\InvalidUserToken;
use App\Exceptions\User\UserNotCreatedException;
use App\Mail\PasswordResetMail;
use App\Mail\WelcomeUserEmail;
use Illuminate\Auth\AuthenticationException;
use App\Mail\ConfirmUserEmail;
use Illuminate\Support\Str;
use App\traits\ResponseHandler;
use App\Models\PasswordReset;

class UserControllerService implements UserServiceInterface
{
    use ResponseHandler;
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
            return $this->generateEmailSentResponse();
        }
        throw new UserNotCreatedException ;
    }

    public function activateUserAccount($token){
        if($user = $this->userService->getUserByActivationToken($token))
        {
            $this->userService->activateUserAccount($user);
            $this->mailService->sendUserMail($user, new WelcomeUserEmail());
            return $this->generateEmailSentResponse();
        }
        throw new InvalidUserToken ;
    }

    public function sendPasswordReset($email){
        if($user=$this->userService->getUserByEmail($email))
        {

            $this->mailService->sendUserMail($user, new PasswordResetMail($this->userService->createPasswordReset($email)));
            return $this->generateEmailSentResponse();
        }
        throw new AuthenticationException ;
    }

    public function verifyPasswordResetToken($token)
    {
        if($passwordReset=$this->userService->verifyPasswordResetToken($token))
        {
            return $passwordReset;
        }
        throw new InvalidUserToken ;
    }

    public function resetUserPassword($email,$password,$token)
    {
        if ($passwordReset=$this->verifyPasswordResetToken($token))
        {
            $this->userService->updateUserPassword($this->userService->getUserByEmail($email),$password);
            return $this->generateResponse(['success'=>'password updated successfully'],200);
        }
        throw new InvalidUserToken ;
    }



}
