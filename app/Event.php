<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'titre', 'categorie_id', 'description','image','user_id'
    ];
    public function categorie(){
        return $this ->belongsTo('App\Categorie');
    }
    public function user(){
        return $this ->belongsTo('App\User');
    }
}
