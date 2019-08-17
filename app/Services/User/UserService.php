<?php


namespace App\Services\User;


use App\Exceptions\User\InvalidUserToken;
use App\Exceptions\User\UserNotCreatedException;
use App\Mail\ConfirmUserEmail;
use App\Mail\PasswordResetMail;
use App\Mail\WelcomeUserEmail;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\Interfaces\UserServiceInterface;
use Illuminate\Auth\AuthenticationException;
use App\traits\ResponseHandler;
use App\Services\MailService;
use Illuminate\Support\Str;

class UserService implements UserServiceInterface
{
    use ResponseHandler;

    protected $userRepository, $mailService ;
    public function __construct(UserRepositoryInterface $userRepository,MailService $mailService)
    {
        $this->userRepository = $userRepository;
        $this->mailService=$mailService;
    }

    public function createUser($name,$email,$password){

        $activationToken = $this->generateRandomToken();
        $user = $this->userRepository->createUser($name,$email,
                                                    $this->encryptPassword($password),$activationToken);

        if(!$user)
        {
            throw new UserNotCreatedException ;
        }

        $this->mailService->sendUserMail($user, new ConfirmUserEmail($user));
        return $this->generateEmailSentResponse();
    }

    public function activateUserAccount($activationToken){
        $user = $this->userRepository->getUserByActivationToken($activationToken);

        if(!$user)
        {
            throw new InvalidUserToken ;
        }

        $this->userRepository->activateUserAccount($user);
        $this->mailService->sendUserMail($user, new WelcomeUserEmail());
        return $this->generateEmailSentResponse();
    }

    public function sendPasswordReset($email){
        $user=$this->userRepository->getUserByEmail($email);

        if(!$user)
        {
            throw new AuthenticationException ;
        }
        $this->mailService->sendUserMail($user, new PasswordResetMail($this->userRepository->createPasswordReset($email)));
        return $this->generateEmailSentResponse();
    }

    public function verifyPasswordResetToken($passwordResetToken)
    {
        $passwordReset=$this->userRepository->getPasswordResetByToken($passwordResetToken);

        if(!$passwordReset)
        {
            throw new InvalidUserToken ;
        }
        return $passwordReset;
    }

    public function resetUserPassword($email,$password,$passwordResetToken)
    {
        $passwordReset=$this->verifyPasswordResetToken($passwordResetToken);

        if (!$passwordReset)
        {
            throw new InvalidUserToken ;
        }
        $this->userRepository->updateUserPasswordByEmail($email,$this->encryptPassword($password));
        return $this->generateResponse(['success'=>'password updated successfully'],200);

    }

    private function generateRandomToken(){
        return Str::random(10);
    }

    private function encryptPassword($password){
        return encrypt($password);
    }
}
