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

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showCategory()
	{
		$subcat = array();
		$categories = Category::all();

		foreach($categories as $cat){
			$subcat[$cat->cid] = Subcategory::where('cid','=',$cat->cid)->get();
		}
		//$arr = array('categories' => $categories, 'subcategories' => $subcat);
		return View::make('category')->with('categories',$categories)->with('subcategories',$subcat);
	}

	public function showHome()
	{
		// show the form
		return View::make('home');
	}

	public function showDashboard()
	{
		return View::make('dashboard');
	}

	public function showPayment()
	{
		return View::make('payment');
	}

	public function showAdmin()
	{
		return View::make('admin');
	}

	public function showCreateAudio()
	{
		return View::make('createaudio');
	}

	public function showAddAudio()
	{
		return View::make('addaudio');
	}

	public function doLogin()
	{
		Session::flush();
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
			} else {

			// create our user data for the authentication
				$userdata = array(
					'email' 	=> Input::get('email'),
					'password' 	=> Input::get('password')
					);

			// attempt to do the login
				if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');

					return Redirect::to('dashboard');

				} else {	 	

				// validation not successful, send back to form	
					return Redirect::to('login');

				}

			}
		}

		public function doLogout(){
			Auth::logout(); // log the user out of our application
			Session::flush();
			return Redirect::to('login'); // redirect the user to the login screen
		}

		public function merge(){
			if(Input::has('submitted')){
				echo "Starting ffmpeg...\n\n";
				echo shell_exec("/usr/local/bin/ffmpeg -i 'concat:/Applications/MAMP/htdocs/yoga_audio/yoga_audio/public/audio/input1.mp3|/Applications/MAMP/htdocs/yoga_audio/yoga_audio/public/audio/input2.mp3' -acodec copy /Applications/MAMP/htdocs/yoga_audio/yoga_audio/public/output.mp3");
				echo "Done.\n";
			}
		}

		public function showTest(){
			return View::make('testaudio');
		}
}
