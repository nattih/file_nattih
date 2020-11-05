<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentRendu extends Model
{
    protected $guarded = [];

    public function user(){
        return $this ->belongsTo('App\User');
    }
    
    public function commentable(){
        return $this ->morphTo(); // pour dire que ce model comementrendu aura plusieur model parent
    }
  

    public function comments(){
        return $this ->morphMany('App\CommentRendu', 'commentable' )->latest();
    }
}
