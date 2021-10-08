<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\UserDetail;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Symfony\Component\HttpFoundation\Response;

class SocialController extends Controller
{
    
    //Google================================================================
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    //==Callback
    public function googleCallback()
    {
        date_default_timezone_set('Australia/Melbourne');
        $time = date('m/d/Y h:i:s a', time()); 
        $user = Socialite::driver('google')-> stateless() -> user();

        $isUser = User::where('email_id', $user->id )->first();

        if ($isUser) {

            Auth::login($isUser, $remember = true);

            return response() -> json([
                'status' => true,
                'message' => 'Đã tồn tại user',
                'user' => $isUser
            ]);

        }else{
            $createUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $time,
                'email_id' => $user->id,
                'password' => ''
            ]);
            // $createUser -> roles() -> syncWithoutDetaching([2]);
            $picture = $user -> avatar;

            UserDetail::Create(
                [
                    'user_id' => $createUser -> id,
                    'avatar' => $picture,
                ]
            );
        }

        Auth::login($createUser);

        return response() -> json([
            'status' => true,
            'message' => 'Register success',
            'user' => $createUser
        ]);

    }
    
}
