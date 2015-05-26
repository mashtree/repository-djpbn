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

Route::get('lsauthor','ListController@listAuthor');

Route::get('book/{id}','ListController@book');

Route::get('read/{id}','ListController@read');

Route::get('summary/{id}','ListController@pratinjau');

Route::get('watch/{id}','ListController@watch');

Route::group(array('prefix'=>'admin','before'=>'auth'),function(){

	Route::get('list={kat}','BackendController@callList');

	Route::get('katalog','BackendController@katalog');
	
	Route::get('rkmkatalog','BackendController@addKatalog');

	Route::post('rkmkatalog', array('as'=>'katalog','uses'=>'BackendController@addKatalog'));
	
	Route::post('lkkatalog','BackendController@like');
	
	Route::get('rkmartikel','BackendController@addArtikel');

	Route::post('rkmartikel', array('as'=>'artikel','uses'=>'BackendController@addArtikel'));
	
	Route::get('author','BackendController@author');
	
	Route::get('rkmauthor','BackendController@addAuthor');

	Route::post('rkmauthor',array('as'=>'author','uses'=>'BackendController@addAuthor'));
	
	Route::get('rmauthor/{id}','BackendController@delAuthor');
	
	Route::get('publisher','BackendController@publisher');
	
	Route::get('rkmpublisher','BackendController@addPublisher');
	
	Route::post('rkmpublisher',array('as'=>'publisher','uses'=>'BackendController@addPublisher'));
	
	Route::get('user','BackendController@user');
	
	Route::get('rkmuser','BackendController@addUser');
	
	Route::post('rkmuser',array('as'=>'user','uses'=>'BackendController@addUser'));
	
	Route::get('tag','BackendController@tag');
	
	Route::post('tag',array('as'=>'tag','uses'=>'BackendController@addTag'));

});

Route::get('get_author','BackendController@getAuthor');

Route::get('login','AuthController@login');

Route::post('login','AuthController@doLogin');

Route::get('logout','AuthController@doLogout');