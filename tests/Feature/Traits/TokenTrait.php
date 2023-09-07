<?php

namespace Tests\Feature\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait TokenTrait
{
    public function createToken()
    {
        $user = User::factory()->create();
        $token = Auth::attempt(['email' => $user->email, 'password' => 'password']);
        return $token;
    }
}
