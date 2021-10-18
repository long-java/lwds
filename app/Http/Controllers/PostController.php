<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    private $postService;
    public function __construct(PostService $postService){
        $this -> postService = $postService;
    }

    //ADMIN - DELETE MULTI POST
    public function destroyMulti($ids){
        try{
            $rs = $this -> postService -> destroyMulti($ids);
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

    //ADMIN - UPDATE POST
    public function updateAdmin($post_id, Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required', 'max:255',
            'content_html' => 'required',
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Fields cannot be left blank !!!',
            ]);
        }
        $validated = $validator->validated();
        $data['title'] = $validated['title'];
        $data['content_html'] = $validated['content_html'];
        $post = $this -> postService -> saveAdmin($data, $post_id);
        return response() -> json([
            'status' => true,
            'code'   => Response::HTTP_OK,
            'post' => $post,
        ]);
    }





    //GUEST
    public function update($post_id, Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required', 'max:255',
            'content' => 'required',
            'content_html' => 'required',
            'tags' => 'required'
        ]);
        if ($validator->fails()) {
            // return redirect('post-up') -> withErrors($validator) -> withInput();
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Fields cannot be left blank !!!',
            ]);
        }
        $validated = $validator->validated();
        $data['title'] = $validated['title'];
        $data['content'] = $validated['content'];
        $data['content_html'] = $validated['content_html'];
        $data['tags'] = $validated['tags'];
        $post = $this -> postService -> save($data, $post_id);
        return response() -> json([
            'status' => true,
            'code'   => Response::HTTP_OK,
            'post' => $post,
        ]);
    }


    public function getMyPosts($post_id){
        try{
            $user_id = Auth::user()->id ?? -1;

            $isEdit = false;
            if($post_id == 'my' || $post_id == $user_id){
                $isEdit = true;
            }

            $posts = $this->postService -> getMyPosts($post_id);
            foreach ($posts as $post)
            {
                $post -> time_before = $this -> postService -> calculateTimeBefore($post -> created_at); 
                $post -> name  =  $post -> users -> name;
                $post -> avatar = $post -> users -> user_details -> avatar;
                $post -> number_comment  =  $post -> comment_posts -> count();
            }  

            return response() -> json([
                'status' => true,
                'isEdit' => $isEdit,
                'posts' => $posts,
            ]);

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }

    }

    //store post
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required', 'max:255',
            'content' => 'required',
            'content_html' => 'required',
            'tags' => 'required'
        ]);

        if ($validator->fails()) {
            // return redirect('post-up') -> withErrors($validator) -> withInput();
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Fields cannot be left blank !!!',
            ]);
        }

        $validated = $validator->validated();

        $data['title'] = $validated['title'];
        $data['content'] = $validated['content'];
        $data['content_html'] = $validated['content_html'];
        $data['tags'] = $validated['tags'];

        $post = $this -> postService -> save($data);

        return response() -> json([
            'status' => true,
            'code'   => Response::HTTP_OK,
            'post' => $post,
        ]);

    }


    //get all post (GUEST - AMIN)
    public function index(Request $request)
    {
        try{
            $tag = $request -> get('tag');
            $isFollow = $request -> get('isfollow');
            $search = $request -> get('search');
            // return $tag;


            $orderBys = [];
            if($request->get('column') && $request->get('sort')){
                $orderBys['column'] = $request->get('column');
                $orderBys['sort'] = $request->get('sort');
            }


            $posts = $this->postService->getAll($orderBys, $tag, $isFollow,$search);

            // return $posts;

            foreach ($posts as $post)
            {
                $post -> time_before = $this -> postService -> calculateTimeBefore($post -> created_at); 
                $post -> name  =  $post -> users -> name;
                $post -> avatar = $post -> users -> user_details -> avatar;
                $post -> tags = $post -> tags;
                $post -> number_comment  =  $post -> comment_posts -> count();
            }  

            return response() -> json([
                'status' => true,
                'posts' => $posts,
            ]);
    
        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
        
    }


    public function checkVoteOrDown($id){
        $rs = $this->postService->checkVoteOrDown($id);
        return response() -> json([
            'rsUp' => $rs['rsUp'],
            'rsDown' => $rs['rsDown'],
        ]);

    }



    public function getNumberVoteById($id){
        $rs = $this->postService->getNumberVoteById($id);
        return response() -> json([
            'numberVote' => $rs
        ]);

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $post = $this->postService->getById($id);

            // $obj = array();
            // foreach (json_decode($post) as $key => $value)
            // {
            //     $obj[$key] = $value;
            // }
            
            // $obj['user_name'] = $post -> users -> name;
            // $obj['user_web'] = $post -> users -> user_web;
            // $obj['user_avatar'] = $post -> users -> user_details -> avatar;
            // $obj['time_before'] = $this -> postService -> calculateTimeBefore($post -> created_at);
            // $obj['number_comment'] = $post -> comment_posts -> count();

            $post -> user_name = $post -> users -> name;
            $post -> user_web  = $post -> users -> user_web;
            $post -> user_avatar  = $post -> users -> user_details -> avatar;
            $post -> time_before  = $this -> postService -> calculateTimeBefore($post -> created_at);
            $post -> number_comment  = $post -> comment_posts -> count();
            $post -> tags = $post -> tags;

            if($post != null){
                return response() -> json([
                    'status' => true,
                    'code' => 200,
                    'post' => $post,
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

    //=== Vote Up Post =================================================
    public function voteUp( $id_post){

        $rs = $this->postService->voteUp($id_post);
        return response() -> json([
            'status' => true,
            'number_vote_up' => $rs
        ]);
    }

    //=== Vote Down Post =================================================
    public function voteDown($id_post){
        $rs = $this->postService->voteDown($id_post);
        return response() -> json([
            'status' => true,
            'number_vote_down' => $rs
        ]);
    }


    //Destroy Post (Only GUEST)
    public function destroy($id)
    {
        $rs = $this -> postService-> delete($id);
        return response() -> json([
            'status' => true,
            'rs' => $rs
        ]);
    }
}
