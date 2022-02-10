<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Models\Role;

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

Route::get('/','App\Http\Controllers\ArticleController@index');//
//admin
Route::group(['middleware' => 'm_roles', 'roles' => ['admin']],function(){
   // Route::get('/addarticle','App\Http\Controllers\ArticleController@create');//
    Route::post('/addarticle/{id}','App\Http\Controllers\ArticleController@store');//
    Route::get('/controlarticles','App\Http\Controllers\ArticleController@controlarticle');//
    Route::get('/editarticle/{id}','App\Http\Controllers\ArticleController@edit');//
    Route::put('/editarticle/{id}','App\Http\Controllers\ArticleController@update');//
    Route::delete('/deletearticle/{id}','App\Http\Controllers\ArticleController@destroy');//
    Route::get('/showusers','App\Http\Controllers\UserController@index');//
    Route::post('/addRole','App\Http\Controllers\UserController@addrole');//
});
//user
Route::get('/article/{id}','App\Http\Controllers\ArticleController@show');//
//user login
Route::group(['middleware' => 'm_roles', 'roles' => ['user','admin','editor']],function(){
    Route::get('/info','App\Http\Controllers\UserController@showuser');//
    Route::post('/addcomment/{id}/{user_id}','App\Http\Controllers\CommentController@store');//
});
Route::group(['middleware' => 'm_roles', 'roles' => ['admin','editor']],function(){
    Route::get('/showuserseditor','App\Http\Controllers\UserController@indexeditor');//
});
Auth::routes();
Route::get('/access',function(){
    return view('content.access');//
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
