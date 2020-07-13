<?php

use Illuminate\Database\Seeder;

class CmsPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('cms_pages')->delete();
        \DB::statement('set foreign_key_checks = 1');
        
        \DB::table('cms_pages')->insert(array (
            0 => 
            array (
                'id' => 19,
                'name' => 'Home',
                'url' => NULL,
                'is_deleted' => 0,
                'created_at' => '2020-07-05 05:04:03',
                'updated_at' => '2020-07-05 09:58:45',
            ),
            1 => 
            array (
                'id' => 20,
                'name' => 'Listings',
                'url' => NULL,
                'is_deleted' => 0,
                'created_at' => '2020-07-05 05:04:36',
                'updated_at' => '2020-07-05 09:58:55',
            ),
            2 => 
            array (
                'id' => 22,
                'name' => 'About',
                'url' => NULL,
                'is_deleted' => 0,
                'created_at' => '2020-07-10 05:39:39',
                'updated_at' => '2020-07-10 05:39:39',
            ),
            3 => 
            array (
                'id' => 23,
                'name' => 'Blog',
                'url' => NULL,
                'is_deleted' => 0,
                'created_at' => '2020-07-10 05:55:34',
                'updated_at' => '2020-07-10 05:55:34',
            ),
            4 => 
            array (
                'id' => 24,
                'name' => 'Contact',
                'url' => NULL,
                'is_deleted' => 0,
                'created_at' => '2020-07-10 05:57:44',
                'updated_at' => '2020-07-10 05:57:44',
            ),
            5 => 
            array (
                'id' => 25,
                'name' => 'Testimonials',
                'url' => NULL,
                'is_deleted' => 0,
                'created_at' => '2020-07-10 05:59:40',
                'updated_at' => '2020-07-10 05:59:40',
            ),
            6 => 
            array (
                'id' => 26,
                'name' => 'Blog Details',
                'url' => NULL,
                'is_deleted' => 0,
                'created_at' => '2020-07-10 06:02:33',
                'updated_at' => '2020-07-10 06:02:33',
            ),
        ));
        
        
    }
}