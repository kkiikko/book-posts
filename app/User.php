<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
   public function posts()
   {
       return $this->hasMany('App\Post');
   }
   
   public function comments()
   {
       return $this->hasMany('App\Comment');
   }
   public function getOwnPaginateByLimit(int $limit_count = 5)
   {
       return $this::with('posts')->find(Auth::id())->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
   }
   
   
    public function likedUsers()
    {
        return $this->belongsToMany('App\User', 'like_users', 'liked_user_id', 'liking_user_id');
    }

    
    public function likingUsers()
    {
        return $this->belongsToMany('App\User', 'like_users', 'liking_user_id', 'liked_user_id');
    }
    
    
    public function postlikes()
    {
        return $this->hasMany('App\PostLike');
    }
  


     public function getPaginateByLikeLimit(int $limit_count = 2)
    {
    //   dd($this::withCount('likedUsers')->get()); 
      return $this::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get();
         
    }
}
