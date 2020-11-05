<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendu extends Model
{
    protected $fillable = [
        'titre', 'contenu', 'document', 'user_id'
    ];

    public function user(){
        return $this ->belongsTo('App\User');
    }

    public function comments(){
        return $this ->morphMany('App\CommentRendu', 'commentable' )->latest();
    }
}
