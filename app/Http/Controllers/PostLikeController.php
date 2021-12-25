<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;


class PostLikeController extends Controller
{
   
    public function store(Post $post) {
        $store = UserPost::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
        ]);
        $likeCount = count(UserPost::where('post_id', $post->id)->get());
       
        return response()->json(['likeCount' => $likeCount]);
        
    }

    public function destroy(Post $post) {
        $like = UserPost::where('user_id', \Auth::user()->id)->where('post_id', $post->id)->first();
        $like->delete();
        $likeCount = count(UserPost::where('post_id', $post->id)->get());

        return response()->json(['likeCount' => $likeCount]);
    }
    public function index(Post $post)

    //   {dd($post);
        //   いいね数をカウントする。＄defaultCountに代入してviewに渡す
         $defaultCount = count(UserPost::where('post_id', $post->id)->get());
        // いいねする人といいねされた人のidの対があるか、あった場合は取得。
         $like = UserPost::where('user_id', Auth::user()->id)
                            ->where('post_id', $post->id)
                            ->first();
            
        if ($like) {
            $defaultLiked = true;
        }else{
            $defaultLiked = false;
        }

        return view('posts/show')->with(['post'=>$post, 'defaultCount'=>$defaultCount, 'defaultLiked'=>$defaultLiked]);
    }
    

}

