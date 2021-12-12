<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;

class UserRankController extends Controller
{
   public function index()
    {
        
         return view('userranks/index')->with(['users'=>Auth::user()->getPaginateByLikeLimit()]);
    }
        
}
