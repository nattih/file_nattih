<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $admin= User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('password')
            ]);
        $adminRole=Role::where('name','admin') ->first(); 
        $admin->roles()->attach($adminRole);
    }
}
