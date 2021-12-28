<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
 
 
 
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    protected $fillable = [
        'title',
        'author',
        'image',
        'year',
        ];
    
}
