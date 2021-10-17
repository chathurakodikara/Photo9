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
   /**
    * uses the laravel socialite package to login via facebook
    * the package supports facebook, twitter, linkedin, google, github, gitlab, or bitbucket
    * link to the docs https://laravel.com/docs/8.x/socialite

    * created a CONST then it is easily customizable
    */
    CONST DRIVER_TYPE = 'facebook';

    /**
     * Generate access token with facebook
     */
    public function handleFacebookRedirect()
    {
        return Socialite::driver(static::DRIVER_TYPE)->redirect();
    }

    /**
     * retrieve the token from facebook and create user or update if exist
     * email address take as unique. if email adress exisit user will update unleses create a new user
     * 
     */
    public function handleFacebookCallback()
    {
        try {
            $facebook_user = Socialite::driver(static::DRIVER_TYPE)->user();
            $user = User::updateOrCreate(['email' => $facebook_user->email ?? null], [
                'name' => $facebook_user->name,
                'email' => $facebook_user->email,
                'facebook_id' => $facebook_user->id,
                'facebook_access_token' => $facebook_user->token,
                'password' => Hash::make($facebook_user->id)
            ]);
          
            Auth::login($user);
            return redirect()->route('photo.index');

        } 

        catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'General Exception : ' . json_encode($e->getMessage(), true));

        }catch (\Error $e) {
            return redirect()->route('login')->with('error', 'Error Exception : ' .json_encode($e->getMessage(), true));
        }
        

    }
}
