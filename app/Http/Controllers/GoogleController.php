<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;   

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Find or create user
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    // 'avatar' => $googleUser->getAvatar(),
                    'password' => bcrypt('123456dummy'), // Dummy password
                ]
            );

            Auth::login($user);

            return redirect()->intended('/')->with('success', 'Signed in successfully! Welcome to Ganap. ');

        } catch (\Exception $e) {
            return redirect('/signin')->with('error', 'Unable to login with Google.');
        }
    }
}