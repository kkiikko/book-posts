<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   public function users()
      {
         return $this->belongsToMany('App\User');
      }
 
 
 
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    protected $fillable = [
        'title',
        'author',
        'image',
        'user_id',
        'year',
        ];
    
}
