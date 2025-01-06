<?php

namespace App\Http\Controllers;
use Exception;  // Add this line
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class FacebookController extends Controller
{
    //
    public function redirectToFacebook()
        {
            return Socialite::driver('facebook')
            ->redirect();
    
        }

        public function handleFacebookCallback()
        {
            // dd("ayaw");  
            try {
                // $user = Socialite::driver('facebook')->stateless()->user();
                $user = Socialite::driver('facebook')->user();

               
                // Handle the user data (e.g., store in the database, login user, etc.)
                $findUser = User::where('email', $user->email)->first();
        
                if ($findUser) {
                    Auth::login($findUser);
        
                    return redirect()->intended('/')->with('success', 'Signed in successfully! Welcome to Ganap. ');;
                } else {
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'facebook_id' => $user->id,
                        'password' => encrypt('defaultpassword')
                    ]);
        
                    Auth::login($newUser);
        
                      return redirect()->intended('/')->with('success', 'Signed in successfully! Welcome to Ganap. ');
                }
            } catch (Exception $e) {
                return redirect('/signin')->with('error', 'Unable to login using Facebook. Please try again.');
            }
        }
        
}
