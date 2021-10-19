<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use App\Services\StringHandling;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    private $stringHandling;

    public function __construct(StringHandling $stringHandling){
        $this -> stringHandling = $stringHandling;
    }


    public function register(Request $request)
    {
        $request -> validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required','confirmed'],  //'min:6'
        ]);

        $name = $request -> name;
        $user_web = $this -> stringHandling -> nameToUserWeb($name);

        //heroku
        $maxId = DB::table('users')->max('id');

        $user = User::create([
            'id' => $maxId + 1,
            'name' => $request -> name,
            'email' => $request -> email,
            'user_web' => $user_web,
            'password' => Hash::make($request -> password),
        ]);

        $user -> roles() -> syncWithoutDetaching([3]);

        UserDetail::create([
            'user_id' => $user -> id,
        ]);

        return $user;


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
