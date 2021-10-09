<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommentPostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FollowController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Login Google
// Route::get('/auth/google', [SocialController::class, 'googleRedirect']);
// Route::get('/google/callback', [SocialController::class, 'googleCallback']);

Route::post('/socialite/{provider}', [SocialController::class, 'loginSocialite']);




//Check Auth
Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});

//Login - Register
Route::post("/login",[UserController::class,'login']);
Route::post("/register",[RegisterController::class,'register']);



//Posts
// Route::get("/posts",[PostController::class,'index']);  
Route::get("/post/{id}",[PostController::class,'show']);
Route::get("/post/get-number-vote/{id}",[PostController::class,'getNumberVoteById']);


//Comment Post
Route::get("/comment-post/{id}",[CommentPostController::class,'getCommentPostByIdPost']);

//Tag
Route::get("/tags",[TagController::class,'index']);


//SANCTUM
Route::group(['middleware' => 'auth:sanctum'], function(){
    //CHAT
    Route::get("/chat/rooms",[ChatController::class,'rooms']);
    Route::get("/chat/room/{roomId}/messages",[ChatController::class,'messages']);
    Route::post("/chat/room/{roomId}/message",[ChatController::class,'newMessage']);
    //END CHAT


    //My-follow
    Route::get("/my-follow/{id}",[FollowController::class,'getMyFollow']) -> withoutMiddleware('auth:sanctum');  //get list user (my follow to)
    Route::get("/my-follow-from/{id}",[FollowController::class,'getMyFollowFrom']) -> withoutMiddleware('auth:sanctum');  //get list user (my follow from)
    Route::post("/follow/{id}",[FollowController::class,'store']);  //add follow


    //CheckLogin
    Route::get("/checkauth", function(){
        if(isset(Auth::user() -> id)){
            return 1;
        }else{
            return 0;
        }
    }) -> withoutMiddleware('auth:sanctum'); 
    
    
    //Posts
    Route::get("/posts",[PostController::class,'index'])-> withoutMiddleware('auth:sanctum');  


    //User-Contact
    Route::post("/contact/{id}",[ContactController::class,'store']);
    Route::get("/contacts/{id}",[ContactController::class,'getAllContacts'])-> withoutMiddleware('auth:sanctum');
    
    //Logout - Profile
    Route::post("/logout" ,[UserController::class,'logout']);
    Route::get("/profile/{id}",[UserController::class,'profile'])-> withoutMiddleware('auth:sanctum');
    
    //Account - Post
    Route::put("/post/{id}",[PostController::class,'update']);
    Route::delete("/post/{id}",[PostController::class,'destroy']);
    Route::get("/my-posts/{id}",[PostController::class,'getMyPosts']) -> withoutMiddleware('auth:sanctum');


    //Vote Post
    Route::post("/post/vote-up/{id}",[PostController::class,'voteUp']);
    Route::post("/post/vote-down/{id}",[PostController::class,'voteDown']);
    Route::get("/post/check-vote-or-down/{id}",[PostController::class,'checkVoteOrDown']);
    Route::post("/post",[PostController::class,'store']);




    //Store CommentPost
    Route::post("/comment-post/{id}",[CommentPostController::class,'store']);
    

    Route::get("/auth",function(Request $request){
        // return $request -> user() ;
        dd(Auth::user());
        // auth()->user()->currentAccessToken()->token;
        
    });
    
});





