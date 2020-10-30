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

Route::middleware('auth:sanctum')->get("post","postController@index");
Route::middleware('auth:sanctum')->get("post/{id}","postController@buscar")->where("id","[0-9]+");
Route::middleware('auth:sanctum')->post("post","postController@store");
Route::middleware('auth:sanctum')->delete("post/{id}","postController@destroy")->where("id","[0-9]+");
Route::middleware('auth:sanctum')->put("post/{id}","postController@update")->where("id","[0-9]+");

Route::middleware('auth:sanctum')->get("comentarios","ComentarioController@index");
Route::middleware('auth:sanctum')->get("comentarios/{id}","ComentarioController@index")->where("id","[0-9]+");
Route::middleware('auth:sanctum')->get("post/{id}/comentarios","ComentarioController@show")->where("id","[0-9]+");
Route::middleware('auth:sanctum')->post("post/{id}/comentarios","ComentarioController@store")->where("id","[0-9]+");
Route::middleware('auth:sanctum')->delete("post/{id}/comentarios/{id2}","ComentarioController@destroy")->where(["id"=>"[0-9]+","id2"=>"[0-9]+"]);
Route::middleware('auth:sanctum')->put("post/{id}/comentarios/{id2}","ComentarioController@update")->where(["id"=>"[0-9]+","id2"=>"[0-9]+"]);

Route::middleware('auth:sanctum')->get('/user','AuthController@index');
Route::middleware('auth:sanctum')->delete('/logout','AuthController@logout');
Route::middleware('auth:sanctum')->get('/usuarios','AuthController@usuarios');
Route::middleware('auth:sanctum')->get('/usuarios/perfil','UserController@verPerfil');
Route::middleware('auth:sanctum')->put('/usuarios/perfil/editar','UserController@editarDatos')->middleware('edad', 'privilegio');
Route::middleware('auth:sanctum')->put('/usuarios/editar/{id}','AuthController@editarDatos')->where(["id"=>"[0-9]+","id2"=>"[0-9]+"])->middleware('edad', 'rol');
Route::middleware('auth:sanctum')->delete('/usuarios/eliminar/{id}','AuthController@eliminarUsuario')->where(["id"=>"[0-9]+","id2"=>"[0-9]+"]);
Route::middleware('auth:sanctum')->put('/usuarios/editar/permiso/{id}','AuthController@editarPermiso')->where(["id"=>"[0-9]+","id2"=>"[0-9]+"]);

Route::post("registro","AuthController@registro")->middleware('edad', 'privilegio');
Route::post("login","AuthController@login");