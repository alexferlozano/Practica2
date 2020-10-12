<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("post","postController@index");
Route::post("post","postController@store");
Route::delete("post/{id}","postController@destroy")->where("id","[0-9]+");
Route::put("post/{id}","postController@update")->where("id","[0-9]+");

Route::get("post/{id}","postController@index");
Route::post("post/{id}/comentarios","postController@store");
Route::delete("post/{id}/comentarios/id2","postController@destroy")->where("id","[0-9]+");
Route::put("post/{id}/comentarios/id2","postController@update")->where("id","[0-9]+");