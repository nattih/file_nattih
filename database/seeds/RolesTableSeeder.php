<?php
use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
         
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'sg']);
        Role::create(['name'=>'finance']);
        Role::create(['name'=>'com']);
        Role::create(['name'=>'agent']);
        // Role::create(['name'=>'utilisateur']);
    }
}
