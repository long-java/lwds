<?php

namespace App\Services;
use App\Models\UserContact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ContactService {

    function getAllContacts($user_id){
        if($user_id == 'my'){
            $user_id = Auth::user()->id;
        }

        $contacts =  DB::table('user_contacts')
                        ->join('users', 'users.id', '=', 'user_contacts.writer_id')
                        ->join('user_details', 'user_details.user_id', '=', 'user_contacts.writer_id')
                        ->where('user_contacts.user_id', '=', $user_id)
                        ->select('users.name', 'users.user_web',  'user_contacts.*' , 'user_details.avatar')
                        ->orderBy('created_at','DESC')
                        ->get();

        return $contacts;
    }


    function save($user_id,  $content ) {

        if($user_id == 'my'){
            $user_id = Auth::user()->id;
        }

        $writer_id = Auth::user()->id;

        $contact =  UserContact::create([

            'user_id' => $user_id,
            'writer_id' => $writer_id,
            'content' => $content,


        ]);

        return $contact;

    }

}