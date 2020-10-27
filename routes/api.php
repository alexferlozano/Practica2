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
Route::get("post/{id}","postController@buscar")->where("id","[0-9]+");
Route::post("post","postController@store");
Route::delete("post/{id}","postController@destroy")->where("id","[0-9]+");
Route::put("post/{id}","postController@update")->where("id","[0-9]+");

Route::get("comentarios","ComentarioController@index");
Route::get("comentarios/{id}","ComentarioController@index")->where("id","[0-9]+");
Route::get("post/{id}/comentarios","ComentarioController@show")->where("id","[0-9]+");
Route::post("post/{id}/comentarios","ComentarioController@store")->where("id","[0-9]+");
Route::delete("post/{id}/comentarios/{id2}","ComentarioController@destroy")->where(["id"=>"[0-9]+","id2"=>"[0-9]+"]);
Route::put("post/{id}/comentarios/{id2}","ComentarioController@update")->where(["id"=>"[0-9]+","id2"=>"[0-9]+"]);

Route::middleware('auth:sanctum')->get('/user','AuthController@index');
Route::middleware('auth:sanctum')->delete('/logout','AuthController@logout');

Route::post("registro","AuthController@registro")->middleware('edad', 'privilegio');
Route::post("login","AuthController@login");