<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cahier extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'cnib','contact','motif','genre','user_id'
    ];
    public function user(){
        return $this ->belongsTo('App\User');
    }

    public function getGenreAttribute($attributes){
        return  $this->getGenreOptions()[$attributes];
   }
    public function getGenreOptions(){
         return [ 
             '0'=>'homme',
             '1'=>'femme',
             '2'=> 'autre'
         ];
    }
}
