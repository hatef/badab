<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


use App\Order;

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name("home");

Route::any("/properties/index/{sect}",'PropertyController@index')->name('listing');

Route::any("/properties/add",'PropertyController@add')->name('add_property');
Route::any("/properties/modify",'PropertyController@modify')->name('modify_property')->middleware("auth");
Route::any("/properties/remove",'PropertyController@remove')->name('remove_property')->middleware("auth");
Route::any("/properties/single/{id}",'PropertyController@single')->name('single_property');
Route::any("/properties/single/{id}/{val}",'PropertyController@promote')->name("promote_property")->middleware("auth");
//Services

Route::get("/api/cities",'PropertyController@citiesJSON');
Route::get("/api/types",'PropertyController@typesJSON');

Route::get("/contact",'HomeController@contactUs')->name("contact");

Route::get("/properties/approve/{id}",'PropertyController@approve')->name("approve_property")->middleware("auth");


