<?php

class AuthController extends BaseController{
	
	public function login(){
		//echo Hash::make('admin');
		return View::make('login');
	}

	public function doLogin(){
		$rules = array(
				'username' =>'required',
				'password'	=> 'required'
			);

		$validator = Validator::make(
				Input::all(),$rules
			);

		if($validator->passes()){
			$userdata = array(
		        'username'     	=> Input::get('username'),
		        'password'  	=> Input::get('password')
		    );
			
		    // attempt to do the login
			if (Auth::validate($userdata)) {
		    if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		       return Redirect::to('admin');

		    } else {        
				echo "gagal login";
		        // validation not successful, send back to form 
		        //return Redirect::to('login');

		    }
			}else{
				echo "gagal validasi";
			}
			
		}else{
			//echo 'gagal validasi';
			return Redirect::to('login')
					->withErrors($validator)
					->withInput();
		}
	}

	public function doLogout(){
		Auth::logout();
		return Redirect::to('/');
	}
}