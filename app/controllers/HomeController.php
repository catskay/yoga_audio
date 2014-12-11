<?php

use Illuminate\Support\MessageBag;

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
		$experiences = array();

		if(Auth::check()){
			$experiences = Experience::where('uid','=',Auth::user()->uid)->get();
		}

		return View::make('dashboard')->with('experiences',$experiences);
	}

	public function showPayment()
	{
		Session::put('subcatId',Input::get('subcatId'));

		$subcat = Subcategory::where('sid','=',Input::get('subcatId'))->first();

		return View::make('payment')->with('subcat',$subcat);
	}

	public function showPaymentLoggedIn()
	{
		if(Auth::check()){
			$user = Auth::user();
		}
		$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();

		return View::make('payment-loggedin')->with('user',$user)->with('subcat',$subcat);
	}

	public function showPaymentRegistered()
	{
		if(Auth::check()){
			$user = Auth::user();
		}
		$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();

		return View::make('payment-registered')->with('user',$user)->with('subcat',$subcat);
	}

	public function showAdmin()
	{
		if(Input::has('subid')){
			$sid = Input::get('subid');
			Subcategory::where('sid', '=', $sid)->delete();
		}
		if(Input::has('catName')){
			$cname = Input::get('catName');
			$cat = new Category;
			$cat->cname = $cname;
			$cat->save();
		}
		if(Input::has('categories')){
			$cid = Input::get('categories');
			Category::where('cid', '=', $cid)->delete();
		}

		$subcat = array();
		$categories = Category::all();

		foreach($categories as $cat){
			$subcat[$cat->cid] = Subcategory::where('cid','=',$cat->cid)->get();
		}

		return View::make('admin')->with('categories',$categories)->with('subcategories',$subcat);
	}

	public function showDownload()
	{
		$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();

		$exp = new Experience;
		$exp->uid = Auth::user()->uid;
		$exp->sid = Session::get('subcatId');
		$exp->ename = $subcat->sname;
		$exp->notes = 'Notes go here.';
		$exp->date = date('Y-m-d');
		$exp->save();

		return View::make('download')->with('subcat',$subcat);
	}


	public function doLogin()
	{
		$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();
		//Session::flush();
		if(Input::get('submit')==='Login'){
			
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
			return Redirect::to('payment')->with('subcat',$subcat)
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
						if(Input::get('from')==='home'){
							return Redirect::to('dashboard');
						}
						else{
							return Redirect::to('payment-loggedin')->with('subcat',$subcat);
						}

					} else {	 	

				// validation not successful, send back to form	
						$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
						return Redirect::to('payment')->with('subcat',$subcat);

					}

				}

			}
			else{
				if($this->register()){
					return Redirect::to('payment-registered')->with('subcat',$subcat);
				}
				else{
					return Redirect::to('payment')->with('subcat',$subcat);
				}
			}
				
		}

		public function doLogout(){
			Auth::logout(); // log the user out of our application
			Session::flush();
			return Redirect::to('home'); // redirect the user to the login screen
		}

		public function register(){
			
			$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();

			// validate the info, create rules for the inputs
			$rules = array(
			'regEmail' => 'required|email',
			'regPass' => 'required|alphaNum|min:3'
			);

		// run the validation rules on the inputs from the form
			$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
			if ($validator->fails()) {
				return Redirect::to('payment')->with('subcat',$subcat)
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
			} else{

				$userdata = array(
					'email' 	=> Input::get('regEmail'),
					'password' 	=> Input::get('regPass')
					);

				$user = new User;
				$user->name = Input::get('regFname').' '.Input::get('regLname');
				$user->email = $userdata['email'];
				$user->password = Hash::make($userdata['password']);
				$user->save();


				if (Auth::attempt($userdata)) {
				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');

					return true;

				} else {	 	
				// validation not successful, send back to form	
					return false;

				}
			}
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
