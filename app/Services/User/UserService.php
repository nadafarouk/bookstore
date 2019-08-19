<?php


namespace App\Services\User;


use App\Exceptions\User\UserException;
use App\Mail\ConfirmUserEmail;
use App\Mail\PasswordResetMail;
use App\Mail\WelcomeUserEmail;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\Interfaces\UserServiceInterface;
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
            throw new UserException('USER_NOT_CREATED') ;
        }

        $this->mailService->sendUserMail($user, new ConfirmUserEmail($user));
    }

    public function activateUserAccount($activationToken){
        $user = $this->userRepository->getUserByActivationToken($activationToken);

        if(!$user)
        {
            throw new UserException('INVALID_TOKEN') ;
        }

        $this->userRepository->activateUserAccount($user);
        $this->mailService->sendUserMail($user, new WelcomeUserEmail());
    }

    public function sendPasswordReset($email){
        $user=$this->userRepository->getUserByEmail($email);

        if(!$user)
        {
            throw new UserException('USER_NOT_FOUND') ;
        }
        $this->mailService->sendUserMail($user, new PasswordResetMail($this->userRepository->createPasswordReset($email)));
    }

    public function verifyPasswordResetToken($passwordResetToken)
    {
        $passwordReset=$this->userRepository->getPasswordResetByToken($passwordResetToken);

        if(!$passwordReset)
        {
            throw new UserException('INVALID_TOKEN') ;
        }
        return $passwordReset;
    }

    public function resetUserPassword($email,$password,$passwordResetToken)
    {
        $passwordReset=$this->verifyPasswordResetToken($passwordResetToken);

        if (!$passwordReset)
        {
            throw new UserException('INVALID_TOKEN') ;
        }
        $this->userRepository->updateUserPasswordByEmail($email,$this->encryptPassword($password));
    }

    public function revokeAccessToken($user)
    {
        if(! $this->userRepository->revokeAccessToken($user)){
            throw new UserException('TOKEN_NOT_REVOKED');
        }
    }

    private function generateRandomToken(){
        return Str::random(10);
    }

    private function encryptPassword($password){
        return encrypt($password);
    }
}
