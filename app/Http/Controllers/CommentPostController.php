<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentPostService;

use function PHPUnit\Framework\isEmpty;

class CommentPostController extends Controller
{

    private $commentPostService;
    public function __construct(CommentPostService $commentPostService){
        $this -> commentPostService = $commentPostService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCommentPostByIdPost($id_post)
    {
        try{
            $commentPosts = $this -> commentPostService -> getCommentPostByIdPost($id_post);
            // dd( $commentPosts -> first() );

            if($commentPosts -> first() != null){
                return response() -> json([
                    'status' => true,
                    'code' => 200,
                    'CommentPosts' => $commentPosts,
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






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        try{
            $content = $request -> content;
            $commentPost = $this -> commentPostService -> save($post_id, $content);
            return response() -> json([
                'status' => true,
                'code' => 404,
                'commentPost' => $commentPost,
            ]);

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => 404,
                'message' => $e->getMessage(),
            ]);

        }




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
