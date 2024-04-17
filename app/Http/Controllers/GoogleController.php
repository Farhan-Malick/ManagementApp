<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Services\GoogleOAuthService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;



class GoogleController extends Controller
{
    
    
    public function loginWithGoogle()
{
    return socialite::driver('google')->redirect();
  
}

public function callbackFromGoogle(Request $request)
{
    try {
        // dd(Socialite::driver('google')->user());
        
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // User with this email already exists
            return redirect()->back()->with('error', 'User already exists with this email');
        } else {
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('taskDetail');
            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName() . '@' . $user->getId()),
                    'google_id' => $user->getId(),
                ]);
                Auth::login($newUser);

                return redirect()->intended('taskDetail');
            }
        }
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}




}
