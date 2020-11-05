<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
 
            // NB: on peut en creer autant quon veut de gate pour permettre des actions

        $this->registerPolicies();
        //les acces en une function grouper pour ne pas creer à chaq fois des isUsers....
        Gate::define('manage-users', function($user) {
            return $user->hasAnyRole(['sg','admin']);
        });
        
        //une Gate qui nous permet d'avooir le droit de modifier un user ou pas
        Gate::define('edit-users', function ($user) {
            return $user->hasAnyRole(['sg','admin']);
        });

        //une Gate qui nous permet d'avooir le droit de supprimer un user ou pas
        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('secretariat', function ($user) {
            return $user->isSg();
        });

        Gate::define('finance', function ($user) {
            return $user->isFinance();
        });
        Gate::define('com', function ($user) {
            return $user->isCom();
        });
    }
}
