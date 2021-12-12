<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function create(Post $post)
    {
        return view('comments/create')->with(['post'=>$post]);
    }
    
    public function store(CommentRequest $request, Post $post, Comment $comment)
    {   
        $input = $request['comment'];
        $input['post_id'] = $post->id;
        $input['user_id'] = auth()->user()->id;
        // dd($input);
        $comment->fill($input)->save();
        return redirect('/');
    }
    
}
