<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TagService;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tag;

class TagController extends Controller
{

    private $tagService;
    public function __construct(TagService $tagService){
        $this -> tagService = $tagService;
    }

    public function index(Request $request)
    {
        $e = $request -> get('e');

        $tags = $this -> tagService -> getAll($e);
        
        return response() -> json([
            'status' => true,
            'tags' => $tags
        ]);
    }



    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    //ADMIN
    public function update(Request $request, $id)
    {
        try{
            // $data = [];
            $data['text'] = $request -> text;
            $data['description'] = $request -> description;

            $tag = $this -> tagService -> save($data, $id);

            return response() -> json([
                'status' => true,
                'tags' => $tag,
            ]);

            
        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'message' => $e
            ]);
        }
    }


    //ADMIN - DELETE MULTI
    public function destroyMulti($ids){
        try{
            $rs = $this -> tagService -> destroyMulti($ids);
            return response()->json([
                'status' => true,
                'success'=>"Messages Deleted successfully",
                'rs' => $rs,
            ]);

        }catch(\Exception $e){
            return response()->json([
                'ids' => $ids,
                'idArr' => explode(",", $ids),
                'status' => false,
                'message' => $e
            ]);
        }
    }
}
