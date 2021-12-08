<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\LikeUser;
use Illuminate\Support\Facades\Auth;


class LikeUserController extends Controller
{
    public function store(User $user) {
        $store = LikeUser::create([
            'liking_user_id' => \Auth::user()->id,
            'liked_user_id' => $user->id,
        ]);
        $likeCount = count(LikeUser::where('liked_user_id', $user->id)->get());
       
        return response()->json(['likeCount' => $likeCount]);
        
    }

    public function destroy(User $user) {
        $like = LikeUser::where('liking_user_id', \Auth::user()->id)->where('liked_user_id', $user->id)->first();
        $like->delete();
        $likeCount = count(LikeUser::where('liked_user_id', $user->id)->get());

        return response()->json(['likeCount' => $likeCount]);
    }
    public function index(User $user)

      {
        //   いいね数をカウントする。＄defaultCountに代入してviewに渡す
         $defaultCount = count(LikeUser::where('liked_user_id', $user->id)->get());
        // いいねする人といいねされた人のidの対があるか、あった場合は取得。
        $like = LikeUser::where('liking_user_id', Auth::user()->id)
                            ->where('liked_user_id', $user->id)
                            ->first();
            
        if ($like) {
            $defaultLiked = true;
        }else{
            $defaultLiked = false;
        }

        return view('likeusers/index')->with(['user'=>$user, 'defaultCount'=>$defaultCount, 'defaultLiked'=>$defaultLiked]);
    }
    

}
