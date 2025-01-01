<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    //

    public function create($postId){
        $post=Post::find($postId);
        $UserFromDataBases = User::all();

        return view('comments.create',['post'=>$post,'AllUser'=>$UserFromDataBases]);
    }

    public function store($postId){

        request()->validate([
            'comment'=>['required','min:3'],
            'user_id'=>['required','exists:users,id'],
        ]);

        $comment=request()->comment;
        $user_id=request()->user_id;

        Comment::create([
            'comment'=>$comment,
            'user_id'=>$user_id,
            'posts_id'=>$postId,
        ]);

        

        return to_route('posts.show', $postId);
    }
    public function destroy($postId,$commentId){
        $comment=Comment::find($commentId);
        $comment->delete();
        return to_route('posts.show',$postId);


    }
}