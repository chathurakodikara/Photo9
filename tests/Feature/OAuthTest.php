<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OAuthTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */



    public function test_socialite_facebook_login() {
        $abstract_user = Mockery::mock('Laravel\Socialite\Two\User');

        $abstract_user->shouldReceive('getId')
                ->andReturn(rand())
                ->shouldReceive('getNickName')
                ->andReturn(uniqid())
                ->shouldReceive('getName')
                ->andReturn(uniqid())
                ->shouldReceive('getEmail')
                ->andReturn(uniqid() . '@gmail.com')
                ->shouldReceive('getAvatar')
                ->andReturn('https://localhost:8000/auth/facebook/callback');
                
        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstract_user);
   
        Socialite::shouldReceive('driver')
            ->with('facebook')
            ->andReturn($provider);

        Socialite::shouldReceive('driver->user')->andReturn($abstract_user);

        $this->get(route('facebook.callback', ['provider' => 'facebook']))
                ->assertStatus(302)
                ->assertRedirect('/login');
    }

    
}
