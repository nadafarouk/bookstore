<?php


namespace App\Repositories\User;


use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{
    public function createUser($name,$email,$password,$activationToken)
    {
        return User::create([
            'name'=> $name,
            'email'=> $email,
            'password'=> $password,
            'activation_token'=>$activationToken
        ]);
    }

    public function getUserByEmail($email){
        return User::where('email',$email)->first();
    }

    public function getUserById($id){
        return User::where('id',$id)->first();
    }

    public function getUserByActivationToken($token){
        return User::where('activation_token',$token)->first();
    }

    public function getPasswordResetByToken($token){
        return PasswordReset::where('token',$token)->first();
    }

    public function createPasswordReset($email)
    {
        return PasswordReset::create(['email'=>$email,'token'=> Str::random(100)]);

    }
    public function activateUserAccount($user)
    {
        $user->active=true;
        $user->activation_token='';
        $user->save();
        return $user;
    }

    public function updateUserPassword($user,$password)
    {
        $password=bcrypt($password);
        $user->password=$password;
        $user->save;
        return $user;
    }
}
