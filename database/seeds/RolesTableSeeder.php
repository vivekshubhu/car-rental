<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
 
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('roles')->delete();
        \DB::statement('set foreign_key_checks = 1');
        Role::create(['name' =>'admin']);
        Role::create(['name' =>'user']);
    }
}
