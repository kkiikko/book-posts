<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{   use SoftDeletes;
    protected $table = 'posts';
    public function getPaginateByLimit(int $limit_count = 1)
    {
        // return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'book_id',
        ];
        
    public function user()
    
    {
        return $this->belongsTo('App\User');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
     public function postlikes()
    {
        return $this->hasMany('App\PostLike');
    }
}
