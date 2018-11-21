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



Route::post('storeContact', [
    'uses' => 'ContactController@storeFunc',
    'as' => 'storeContact'
]);
Route::get('viewContact', [
    'uses' => 'ContactController@storeFunc',
    'as' => 'viewContact'
]);

Route::get('allContact', [
    'uses' => 'ContactController@allContact',
    'as' => 'allContact'
]);
Route::get('/', [
    'uses' => 'ContactController@allContact',
    'as' => '/'
]);


Route::post('delete',[
    'uses'  =>  'ContactController@delete',
    'as'    =>  'delete'
]);
Route::post('edit',[
    'uses'  =>  'ContactController@edit',
    'as'    =>  'edit'
]);

Route::post('update',[
    'uses'  =>  'ContactController@update',
    'as'    =>  'update'
]);








// image route

Route::get('image-form','ItemController@index');
Route::post('image-upload',['uses'=>'ItemController@store', 'as'=> 'image-upload']);


//register route

Route::resource('user', 'UserController');
Route::get('verify/{token}', 'UserController@verifyMail')->name('verify');
Route::get('login', 'UserController@loginform')->name('login');
Route::post('login', 'UserController@loginprocess')->name('login');
Route::get('logout', 'UserController@logout');














Route::get('item',[
    'uses'    =>'ItemController@index',
    'as'    =>'item'
]);

Route::resource('links', 'LinkControllere');
