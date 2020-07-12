<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$XxtuT./GUFH4LW.XVOzeM.B1FKEEg/2YC0LvHkvDjMuiLzbpbls0C',
                'remember_token' => NULL,
                'created_at' => '2020-07-02 12:23:24',
                'updated_at' => '2020-07-02 12:23:24',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'email' => 'user@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$cdz/EKtXy9RbfjNHQG.RaOCda5PIzINPMxMO7t4qSiPqVHSiJo1wG',
                'remember_token' => NULL,
                'created_at' => '2020-07-11 08:42:51',
                'updated_at' => '2020-07-11 08:42:51',
            ),
        ));
        
        
    }
}