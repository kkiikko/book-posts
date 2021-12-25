<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   
    protected $appends = [
      'likes_count', 'liked_by_user',
    ];
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
     protected $fillable = [
        'content',
        'user_id',
        'post_id',
        ];
}
