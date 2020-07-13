<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('car_rental/{slug?}', 'ViewController@index');
Route::get('/', 'ViewController@index');
// Route::get('car_rental/listings', 'ViewController@listings');
// Route::get('car_rental/testimonials', 'ViewController@testimonials');
// Route::get('car_rental/about', 'ViewController@about');
// Route::get('car_rental/contact', 'ViewController@contact');
// Route::get('car_rental/blog', 'ViewController@blog');
// Route::get('car_rental/blog-details', 'ViewController@blogDetails');

//page
// Route::post('/add/page', 'postController@addPage');
// Route::get('/page', 'postController@getPages');


Route::get('/scan_components', 'postController@getComponents');


Auth::routes();

Route::get('/admin', 'HomeController@index')->middleware(['auth', 'auth.admin']);

Route::get('/cms/post/', 'postController@getPostsImage');

//edit post
Route::post('/posts/edit/{id}', 'postController@updatePost');

//for vue routes on refreing the page
Route::get('/{any}', 'HomeController@index')->where('any', '.*');
