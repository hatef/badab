<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::any("/admin/contract/create","AdminController@addTemplate")->middleware('auth:api');
Route::get("/admin/contract/delete/:id","AdminController@deleteTemplate")->middleware('auth:api');
Route::any("/admin/contract/update","AdminController@modifyTemplate")->middleware('auth:api');

Route::any("/moderator/article/create","AdminController@addArticle")->middleware('auth:api');
Route::any("/moderator/article/update","AdminController@modifyArticle")->middleware('auth:api');
Route::get("/moderator/article/delete/:id","AdminController@deleteArticle")->middleware('auth:api');

Route::get("/articles","HomeController@articles");

Route::any("/users/index","AdminController@getUsers");