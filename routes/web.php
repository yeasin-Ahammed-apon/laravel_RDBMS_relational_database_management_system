<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use App\Http\Controllers\post;

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



Route::get( '/' , [ users::class , "home" ] );
Route::get( '/login_page' , [ users::class , "login_page" ] );
Route::get( '/registration_page' , [ users::class , "registration_page" ] );
Route::post( '/login' , [ users::class , "login" ] );
Route::post( '/registration' , [ users::class , "registration" ] );
Route::get( '/logout' , [ users::class , "logout" ] );


//
Route::get( '/list' , [ post::class , "list" ] );
Route::get( '/post_page' , [ post::class , "post_page" ] );
Route::post( '/post' , [ post::class , "post" ] );
Route::get( '/all_user_posts' , [ post::class , "all_user_posts" ] );
Route::get( '/view/{id}' , [ post::class , "view" ] );
Route::get( '/delete/{id}' , [ post::class , "delete" ] );

