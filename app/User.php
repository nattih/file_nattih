<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'prenom', 'sexe', 'dat_naiss','residence', 'contact', 'departement_id',
        'poste_id', 'debut_fonction', 'contrat', 'photo','email', 'password', 'deleted_at','salaire'
    ];

    public function getSexeAttribute($attributes){
        return  $this->getSexeOptions()[$attributes];
   }
    public function getSexeOptions(){
        return [
            '0'=>'homme',
            '1'=>'femme',
        ];
   }

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

        public function roles(){
            return $this ->belongsToMany('App\Role');
        }

        public function isAdmin(){
            return $this ->roles()->where('name', 'admin')->first();
            //cette ligne revoyera vrai sino faut si la persone n'est pas admin
        }
        public function isSg(){
            return $this ->roles()->where('name', 'sg')->first();
            
        }
        public function isFinance(){
            return $this ->roles()->where('name', 'finance')->first();
            
        }
        public function isCom(){
            return $this ->roles()->where('name', 'com')->first();
            
        }

        public function hasAnyRole(array $roles) {
            return $this->roles()->whereIn('name',$roles)->first(); // l'eloquent whereIn veut dire qu'on ne veut pas prendre un a un mais en forme de table , 
            //tant qon a le noms de role comme admin ou auteur ca passera 
            
        }
        public function cahiers(){
            return $this ->hasMany('App\Cahier');
        }
        public function events(){
            return $this ->hasMany('App\Event');
        }
        public function departement(){
            return $this ->belongsTo('App\Departement');
        }
        public function poste(){
            return $this ->belongsTo('App\Poste');
        }
        public function rendus(){
            return $this ->hasMany('App\Rendu');
        }
   }


