<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\Feature\Traits\TokenTrait;
use Tests\TestCase;

class JwtLoginTest extends TestCase
{
    use RefreshDatabase, TokenTrait;


    function testUserCanLoginWithValidCredentials()
    {
        $user = User::factory()->create();

        $response = $this->json('post', '/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $response->assertStatus(200);

    }

    public function test_jwt_auth()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->createToken(),
        ])->get('/api/users');

        $response->assertStatus(200);

    }

}
