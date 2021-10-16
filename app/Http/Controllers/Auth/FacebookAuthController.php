<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
   
    CONST DRIVER_TYPE = 'facebook';

    # Generate access token with facebook
    public function handleFacebookRedirect()
    {
        return Socialite::driver(static::DRIVER_TYPE)
            ->scopes(['public_profile', 'user_photos'])
            ->redirect();
    }


    # retrieve the token and create user or update if exist
    public function handleFacebookCallback()
    {
        
        try {
            $facebook_user = Socialite::driver(static::DRIVER_TYPE)->user();

            # user information update from facebook including name
            $user = User::updateOrCreate(['email' => $facebook_user->email ?? null], [
                'name' => $facebook_user->name,
                'email' => $facebook_user->email,
                'facebook_id' => $facebook_user->id,
                'facebook_access_token' => $facebook_user->token,
                'password' => Hash::make($facebook_user->id)
            ]);
          

            Auth::login($user);
            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        

    }
}
