<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = [
        'nom', 'departement_id'
    ];
    public function poste(){
        return $this ->belongsTo('App\Departement');
    }
    public function user(){
        return $this ->hasOne('App\User');
    }
}
