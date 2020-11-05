<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'offre', 'nom', 'motif' , 'email', 'dossier'
    ];

    public function getOffreAttribute($attributes){
        return  $this->getOffreOptions()[$attributes];
   }
    public function getOffreOptions(){
        return [
            '0'=>'stage',
            '1'=>'emploi',
        ];
   }

}
