<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\UserDetail;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Symfony\Component\HttpFoundation\Response;
use App\Services\StringHandling;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{

    private $stringHandling;
    public function __construct(StringHandling $stringHandling){
        $this -> stringHandling = $stringHandling;
    }


    function loginSocialite(Request $request, $provider){
        try{

            date_default_timezone_set('Australia/Melbourne');
            $time = date('m/d/Y h:i:s a', time()); 

            $profile = $request -> get('profile');
            $isUser = "isisis";
            $email_id = "";
            $fb_id = "";
            //check profile isset
            if($provider == "google"){
                $isUser = User::where('email_id', $profile['id'] )->first();
                $email_id = $profile['id'];
            }else{
                if($provider == "facebook"){
                    $isUser = User::where('fb_id', $profile['id'] )->first();
                    $fb_id = $profile['id'];
                }
            }

            //something
            if ($isUser) {

                Auth::login($isUser, $remember = true);
                $token = $isUser->createToken('my-app-token')->plainTextToken;

                return response() -> json([
                    'status' => true,
                    'message' => 'Đã tồn tại user',
                    'token' => $token
                ]);

            }else{
                $user_web = $this -> stringHandling -> nameToUserWeb($profile['name']);
                $maxId = DB::table('users')->max('id');

                $createUser = User::create([
                    'id' => $maxId + 1,
                    'name' => $profile['name'],
                    'user_web' => $user_web,
                    'email' => $profile['email'],
                    'email_verified_at' => $time,
                    'fb_id' => $fb_id,
                    'email_id' => $email_id,
                    'password' => ''
                ]);

                // $createUser -> roles() -> syncWithoutDetaching([2]);
                UserDetail::Create(
                    [
                        'id' => DB::table('user_details')->max('id'),
                        'user_id' => $createUser -> id,
                        'avatar' => $profile['picture'],
                    ]
                );
                Auth::login($createUser);

                $token = $createUser -> createToken('my-app-token')->plainTextToken;
            }





            return response() -> json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'token' => $token
            ]);

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'case' => 'Exception Socilate',
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'mess' => $e->getMessage(),
            ]);
        }


    }


    
    // // Google================================================================
    // public function googleRedirect()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // //==Callback
    // public function googleCallback()
    // {
    //     date_default_timezone_set('Australia/Melbourne');
    //     $time = date('m/d/Y h:i:s a', time()); 
    //     $user = Socialite::driver('google')-> stateless() -> user();

    //     $isUser = User::where('email_id', $user->id )->first();

    //     if ($isUser) {

    //         Auth::login($isUser, $remember = true);

    //         return response() -> json([
    //             'status' => true,
    //             'message' => 'Đã tồn tại user',
    //             'user' => $isUser
    //         ]);

    //     }else{
    //         $createUser = User::create([
    //             'name' => $user->name,
    //             'email' => $user->email,
    //             'email_verified_at' => $time,
    //             'email_id' => $user->id,
    //             'password' => ''
    //         ]);
    //         // $createUser -> roles() -> syncWithoutDetaching([2]);
    //         $picture = $user -> avatar;

    //         UserDetail::Create(
    //             [
    //                 'user_id' => $createUser -> id,
    //                 'avatar' => $picture,
    //             ]
    //         );
    //     }

    //     Auth::login($createUser);

    //     return response() -> json([
    //         'status' => true,
    //         'message' => 'Register success',
    //         'user' => $createUser
    //     ]);

    // }





    
}
