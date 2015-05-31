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

Route::get('/', 'HomeController@home');

Route::get('list={kat}', 'ListController@callList');

Route::get('author/{id}','ListController@author');

Route::get('lsauthor','ListController@listAuthor');

Route::get('book/{id}','ListController@book');

Route::get('read/{id}','ListController@read');

Route::get('summary/{id}','ListController@pratinjau');

Route::get('watch/{id}','ListController@watch');

Route::group(array('prefix'=>'admin','before'=>'auth'),function(){

	Route::get('/','BackendController@home');

	Route::get('list={kat}','BackendController@callList');

	Route::get('katalog','BackendController@katalog');
	
	Route::get('rkmkatalog','BackendController@addKatalog');

	Route::post('rkmkatalog', array('as'=>'katalog','uses'=>'BackendController@addKatalog'));
	
	Route::get('edkatalog/{id}','BackendController@editKatalog');
	
	Route::post('edkatalog',array('as'=>'editkatalog','uses'=>'BackendController@editKatalog'));
	
	Route::get('rmkatalog/{id}','BackendController@delKatalog');
	
	Route::post('lkkatalog','BackendController@like');
	
	Route::post('ceklike','BackendController@cekLike');
	
	Route::get('rkmartikel','BackendController@addArtikel');

	Route::post('rkmartikel', array('as'=>'artikel','uses'=>'BackendController@addArtikel'));
	
	Route::get('author','BackendController@author');
	
	Route::get('rkmauthor','BackendController@addAuthor');

	Route::post('rkmauthor',array('as'=>'author','uses'=>'BackendController@addAuthor'));
	
	Route::get('edauthor/{id}','BackendController@editAuthor');

	Route::post('edauthor',array('as'=>'author.edit','uses'=>'BackendController@editAuthor'));
	
	Route::get('edauthor/{id}','BackendController@editAuthor');
	
	Route::get('rmauthor/{id}','BackendController@delAuthor');
	
	Route::get('publisher','BackendController@publisher');
	
	Route::get('rkmpublisher','BackendController@addPublisher');
	
	Route::post('rkmpublisher',array('as'=>'publisher','uses'=>'BackendController@addPublisher'));
	
	Route::get('edpublisher/{id}','BackendController@editPublisher');
	
	Route::post('edpublisher',array('as'=>'publisher.update','uses'=>'BackendController@editPublisher'));
	
	Route::get('rmpublisher/{id}','BackendController@delPublisher');
	
	Route::get('user','BackendController@user');
	
	Route::get('rkmuser','BackendController@addUser');
	
	Route::post('rkmuser',array('as'=>'user','uses'=>'BackendController@addUser'));
	
	Route::get('eduser/{id}','BackendController@editUser');
	
	Route::post('eduser',array('as'=>'user.update','uses'=>'BackendController@editUser'));
	
	Route::get('rmuser/{id}','BackendController@delUser');
	
	Route::get('quote','BackendController@quote');
	
	Route::get('rkmquote','BackendController@addQuote');
	
	Route::post('rkmquote',array('as'=>'quote','uses'=>'BackendController@addQuote'));
	
	Route::get('edquote/{id}','BackendController@editQuote');
	
	Route::post('edquote',array('as'=>'quote.update','uses'=>'BackendController@editQuote'));
	
	Route::get('rmquote/{id}','BackendController@delQuote');
	
	Route::get('comment','BackendController@comment');
	
	Route::get('rkmcomment/{type}/{id}','BackendController@addComment');
	
	Route::post('rkmcomment',array('as'=>'comment','uses'=>'BackendController@addComment'));
	
	Route::get('rmcomment/{id}','BackendController@delComment');

});

Route::get('get_author','BackendController@getAuthor');

Route::get('login','AuthController@login');

Route::post('login','AuthController@doLogin');

Route::get('logout','AuthController@doLogout');