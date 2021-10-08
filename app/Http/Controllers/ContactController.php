<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    private $contactService;
    public function __construct(ContactService $contactService){
        $this -> contactService = $contactService;
    }



    public function getAllContacts($id_user)
    {
        try{
            $contacts = $this -> contactService -> getAllContacts($id_user);

            if($contacts -> first() != null){
                return response() -> json([
                    'status' => true,
                    'code' => 200,
                    'contacts' => $contacts,
                ]);
            }else{
                return response() -> json([
                    'status' => false,
                    'code' => 404,
                    'message' => "Not Found"
                ]);
            }

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => 404,
                'message' => $e->getMessage(),
            ]);
        }

    }


    public function store(Request $request, $user_id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'content' => 'required', 'max:500',
            ]);
            if ($validator->fails()) {
                return response() -> json([
                    'status' => false,
                    'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => 'Fields cannot be left blank !!!',
                ]);
            }
            $validated = $validator->validated();
            $content = $validated['content'];
            $contact = $this -> contactService -> save($user_id, $content);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'contact' => $contact,
            ]);
        } catch (\Exception $e) {
            return response() -> json([
                'status' => false,
                'message' => $e,
            ]);
        }
    }



    
}
