<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
		$quotes = Quote::all()->toArray();//var_dump($quotes);
		$quote = $quotes[rand(0,count($quotes)-1)];
		$mostviewed = Katalog::orderBy('view','desc')->take(9)->get();
		$lastrelease = Katalog::orderBy('created_at','desc')->take(9)->get();
		return View::make('home',compact('quote','mostviewed','lastrelease'));
	}

}
