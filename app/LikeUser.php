<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeUser extends Model
{
    protected $fillable = ['liking_user_id', 'liked_user_id'];

    protected $table = 'like_users';
    
    
}
