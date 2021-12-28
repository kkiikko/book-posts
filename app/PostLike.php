<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
 protected $table = 'post_likes';
 public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
 
 
  protected $fillable = [ 
      'user_id',
      'post_id',
   ];

}
