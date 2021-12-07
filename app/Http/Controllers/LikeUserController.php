<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\LikeUser;


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
        return view('likeusers/index')->with(['user'=>$user]);
    }
}
