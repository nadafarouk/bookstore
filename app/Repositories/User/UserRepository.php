<?php


namespace App\Repositories\User;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function authenticateUser($email,$password)
    {
        return Auth::attempt([
            'email'=> $email,
            'password'=>$password
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

}