<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{

    public function testCreateUserSuccess(){
        $response = $this->json('POST', '/api/users', ['name' => 'zal','email'=> str_random(5).'@mycreate.com',
            'password'=>'123456','password_confirmation'=>'123456']);

        $response
            ->assertStatus(201)
            ->assertJson([
                "status"=> 1,
                "success" => "user created successfully"
            ]);
    }
    public function testCreateUserEmailError(){
    $response = $this->json('POST', '/api/users', ['name' => 'zal','email'=>'test@mycreate.com',
        'password'=>'123456','password_confirmation'=>'123456']);

    $response
        ->assertStatus(400)
        ->assertJson([
            "status"=> 2,
            "error" => [
                "The email has already been taken."
            ]
        ]);
}
}
