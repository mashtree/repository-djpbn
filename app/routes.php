<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('list={kat}', 'ListController@callList');

Route::get('author/{id}','ListController@author');

Route::get('book/{id}','ListController@book');

Route::get('read/{id}','ListController@read');

Route::get('summary/{id}','ListController@pratinjau');

Route::get('watch/{id}','ListController@watch');

Route::group(array('prefix'=>'admin','before'=>'auth'),function(){

	Route::get('list={kat}','BackendController@callList');

	Route::get('katalog','BackendController@addKatalog');

	//Route::group(array('before'=>'csrf'),function(){
		Route::post('katalog', array('as'=>'katalog','uses'=>'BackendController@addKatalog'));
	//});

	Route::get('aAuthor','BackendController@addAuthor');

	Route::post('aAuthor',array('as'=>'author','uses'=>'BackendController@addAuthor'));

});

Route::get('get_author','BackendController@getAuthor');