<?php

use Illuminate\Support\MessageBag;

class HomeController extends BaseController 
{


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

	/**
	 * Shows view category.blade.php, where user can select a subcategory to purchase.
	 * returns an array of all categories from the db and
	 * the subcategories arranged in format where indexes of the arrays are cid column of category
	 * and values of the array are eloquent arrays of subcategories from db.
	 * ex: array('category->cid' => subcategories).
	 *
	 * @return categories, subcategories
	 */


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


	/**
	 * Shows the homepage.  This is the first page that the user sees where they
	 * can log in or start a new audio script.
	 *
	 * @return none
	 */

	public function showHome()
	{
		// show the form
		return View::make('home');
	}


	/**
	 * shows the dashboard.  If the user logs in from the homepage,
	 * this is where they are redirected.  An eloquent array is returned
	 * containing all 'experiences' belonging to the logged in user.
	 *
	 * @return experiences
	 */

	public function showDashboard()
	{
		$experiences = array();

		if(Auth::check()){
			$experiences = Experience::where('uid','=',Auth::user()->uid)->get();
		}
		if(Input::get('actions') === "Download"){
			$subcatid = Input::get('subcatid');
			$pathToFile = 'audio/subcat'.$subcatid.'.mp3';
			return Response::download($pathToFile);
		}

		return View::make('dashboard')->with('experiences',$experiences);
	}


	//
	/**
	 * shows the payment page (payment.blade.php) where the user can
	 * checkout, login, or register.  Also returns an eloquent object
	 * named 'subcat' which contains the subcategory that the user
	 * selected on the previous page (category.blade.php)
	 * @return subcat
	 */

	public function showPayment()
	{
		if(Input::has('subcatId')){
			Session::put('subcatId',Input::get('subcatId'));
		}

		$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();

		if(Auth::check()){
			$request = Request::create('payment-loggedin', 'GET', array());
			return Route::dispatch($request)->getContent();
		}
		return View::make('payment')->with('subcat',$subcat);
	}


	/**
	 * This view shows after the user logs in from the payment page.
	 * returns the user currently logged in and the subcategory selected.
	 *
	 * @return user, subcat
	 */

	public function showPaymentLoggedIn()
	{
		if(Auth::check()){
			$user = Auth::user();
		}

		$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();

		return View::make('payment-loggedin')->with('user',$user)->with('subcat',$subcat);
	}


	/**
	 * This view shows after the user registers from the payment page.
	 * returns the user currently logged in and the subcategory selected.
	 *
	 * @return user, subcat
	 */

	public function showPaymentRegistered()
	{
		if(Auth::check()){
			$user = Auth::user();
		}
		$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();

		return View::make('payment-registered')->with('user',$user)->with('subcat',$subcat);
	}



	/**
	 * When a user logs in, a filter checks to see if they are an administrator.
	 * if they are, the 'admin' route directs them to this method.
	 * returns an array of all categories from the db and
	 * the subcategories arranged in format where indexes of the arrays are cid column of category
	 * and values of the array are eloquent arrays of subcategories from db.
	 * ex: array('category->cid' => subcategories).
	 *
	 * @return categories, subcategories
	 */

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


	/**
	 * shows the view download.blade.php after checkout. Creates
	 * a new 'experience' for the user and saves it in the db.
	 * returns the selected subcategory.
	 *
	 * @return subcat
	 */

	public function showDownload()
	{
		$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();

		if(!Auth::check()) {
			$request = Request::create('payment', 'GET', array());
			return Route::dispatch($request)->getContent();
		}
		else {
			$exp = new Experience;
			$exp->uid = Auth::user()->uid;
			$exp->sid = Session::get('subcatId');
			$exp->ename = $subcat->sname;
			$exp->notes = 'Notes go here.';
			$exp->date = date('Y-m-d');
			$exp->save();

			return View::make('download')->with('subcat',$subcat);
		}
	}


	/**
	 * post method for users logging in from 'home' or 'payment'.
	 * redirects the user depending on whether they came from 'home' or 'payment'
	 * checks whether the user clicked 'login' or 'register' and reacts accordingly.
	 *
	 * @return mixed
	 */

	public function doLogin()
	{
		$subcat = Subcategory::where('sid','=',Session::get('subcatId'))->first();
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
			if(Input::get('from')==='home'){
				return Redirect::to('home')->with('subcat',$subcat)
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password'));
			}
			else{
				return Redirect::to('payment')->with('subcat',$subcat)
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password'));
			}
			 // send back the input (not the password) so that we can repopulate the form
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
						if(Input::get('from')==='home'){
							return Redirect::to('home');
						}
						else{
							return Redirect::to('payment')->with('subcat',$subcat);
						}

					}

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


		// logs the user out.

	public function doLogout(){
			Auth::logout(); // log the user out of our application
			Session::flush();
			return Redirect::to('home'); // redirect the user to the login screen
		}


		/**
		 * called from method 'doLogin'.  creates a new user with the
		 * specified info and logs them in.
		 *
	 	 * @return bool
	 	*/

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

	}
