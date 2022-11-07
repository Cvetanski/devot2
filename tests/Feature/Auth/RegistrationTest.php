<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

//    public function test_registration_screen_can_be_rendered()
//    {
//        $response = $this->get('/register');
//
//        $response->assertStatus(200);
//    }

    public function test_new_users_can_register()
    {
        $this->withExceptionHandling();

        $response = $this->post('http://127.0.0.1:8000/api/store/', [
            'name' =>"test user",
            'last_name'=>"test lastname",
            'username'=>"test usddername",
            'email'=>"testemai22l@gmail.com",
            'amount'=>"100",
            'password'=>"test123111"
        ]);

        $response->assertStatus(200);
    }
}
