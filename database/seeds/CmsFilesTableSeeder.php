<?php

use Illuminate\Database\Seeder;

class CmsFilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_files')->delete();
        
        \DB::table('cms_files')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '2d384e317cea61e9cb377928ab72ef89.jpg',
                'type' => 'file',
                'table_name' => 'cms_pages',
                'table_id' => 10,
                'is_deleted' => 0,
                'created_at' => '2020-07-09 04:55:51',
                'updated_at' => '2020-07-09 04:55:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '631728bb9a1eb13cd813aaf75a8b333d.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 11,
                'is_deleted' => 0,
                'created_at' => '2020-07-09 05:59:34',
                'updated_at' => '2020-07-09 05:59:34',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '7fe3b07f85789049da28f98e8d5152ca.png',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 12,
                'is_deleted' => 0,
                'created_at' => '2020-07-09 06:00:36',
                'updated_at' => '2020-07-09 10:48:38',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '8a7bf2922d4150cd398f6e1d353bcb63.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 13,
                'is_deleted' => 0,
                'created_at' => '2020-07-09 06:25:35',
                'updated_at' => '2020-07-09 06:25:35',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '9bc0e4ff6af6abd5bea3c56b39285479.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 14,
                'is_deleted' => 0,
                'created_at' => '2020-07-09 06:37:24',
                'updated_at' => '2020-07-09 06:37:24',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '4ebf7b1819abe10eba5aa6ca4da2b05b.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 15,
                'is_deleted' => 0,
                'created_at' => '2020-07-09 07:08:34',
                'updated_at' => '2020-07-09 07:08:34',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '1b66d1d48fe1eb20ac6c22d2a79352b6.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 17,
                'is_deleted' => 0,
                'created_at' => '2020-07-09 07:51:25',
                'updated_at' => '2020-07-09 07:51:25',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '4383f826422f0c763711b239a9c0b0ef.png',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 5,
                'is_deleted' => 0,
                'created_at' => '2020-07-09 10:48:13',
                'updated_at' => '2020-07-09 10:49:46',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '8af3a162365ab907494e42c16ff02bef.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 18,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 02:05:47',
                'updated_at' => '2020-07-11 02:05:47',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '7a9ab0f80ee13d1988cb791e6b488e4e.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 19,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:14:40',
                'updated_at' => '2020-07-11 03:14:40',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'fc71c82670a77a66b5be23da31e48852.png',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 23,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:35:01',
                'updated_at' => '2020-07-11 03:35:01',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '6c3ce434ceae78ede50e2c1a3ea7c0eb.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 24,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:37:05',
                'updated_at' => '2020-07-11 03:37:05',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '73f2932139bc584a0932342277f6ee53.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 25,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:37:10',
                'updated_at' => '2020-07-11 03:37:55',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '70235af0cff6475f76c7a90b32f6560b.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 26,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:37:16',
                'updated_at' => '2020-07-11 03:38:36',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '3dac5a78b50326a5b6eb4b699db1d26a.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 29,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:43:37',
                'updated_at' => '2020-07-11 03:43:37',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '7a989b7aadd4db0b34a6e3b4610f5907.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 30,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:43:40',
                'updated_at' => '2020-07-11 03:44:36',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '6c9acb3f144f185800f54d298c5d5c33.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 31,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:43:42',
                'updated_at' => '2020-07-11 03:43:42',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'c5330baee509eaaa41720f2452c597ce.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 32,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:46:32',
                'updated_at' => '2020-07-11 03:46:32',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '64ff8e531cff03133c2142046b4163f2.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 33,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:46:35',
                'updated_at' => '2020-07-11 03:46:35',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'ea935948fdeb66d961832c4437687099.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 34,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:46:37',
                'updated_at' => '2020-07-11 03:46:37',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => '343cbfa87ab0133b01648fb5990f98d0.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 35,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:47:46',
                'updated_at' => '2020-07-11 03:47:46',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'd10a6c98170431431fc1336ca196da16.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 36,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:47:48',
                'updated_at' => '2020-07-11 03:48:36',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => '9446e48e04fcdc637857cb0c24fbcabb.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 37,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:47:50',
                'updated_at' => '2020-07-11 03:49:03',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => '25eb2f3087e254402cba039b60a67951.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 38,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:50:54',
                'updated_at' => '2020-07-11 03:50:54',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => '7d37a1fd43dfd5b137212c9818c9e679.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 39,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:52:30',
                'updated_at' => '2020-07-11 03:52:30',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => '8944f91d5a2f6cf2ba5dc7b1cb06c1d8.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 40,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:53:41',
                'updated_at' => '2020-07-11 03:53:41',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => '2d356ebeafaf6c610e69c78a7ad10b43.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 41,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:54:31',
                'updated_at' => '2020-07-11 03:54:31',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => '56cb0ee221996a34d27b3955a980ef0b.jpg',
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => 42,
                'is_deleted' => 0,
                'created_at' => '2020-07-11 03:55:17',
                'updated_at' => '2020-07-11 03:55:17',
            ),
        ));
        
        
    }
}