<?php

class FrontendController extends BaseController {

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

	public function index()
	{

		$user = Sentry::getUser();		
		$group = Sentry::findGroupByName('Students');
		$students = Sentry::findAllUsersInGroup($group);

		$portfolios_home = DB::table('portfolios')->take(6)->orderBy('id', 'desc')->get();
		$portfolios_all = Portfolio::all();

		foreach ($students as  $student) {
			if($student->isActivated())
			{
				$allstudents[] = $student;
			}
		}

		return View::make('frontend.home', compact('allstudents', 'user', 'portfolios_home', 'portfolios_all'));
	}
	public function login()
	{
		$studenlist = [];
		return View::make('frontend.login', compact('studenlist'));
	}
	public function register()
	{
		$studenlist = [];
		return View::make('frontend.register', compact('studenlist'));
	}

	public function editprofile()
	{
		$student = Sentry::getUser();
		$student = Sentry::findUserById($student->id);

		if (Request::isMethod('post'))
		{

			$destinationPath = 'uploads/students'; 
		    
		    $extension = Input::file('photo')->getClientOriginalExtension(); 

		    $photo_name = rand(11111,99999).'.'.$extension; 

			Input::file('photo')->move($destinationPath, $photo_name);
			
			$student->username 			= Input::get('username');
			$student->nickname 			= Input::get('nickname');
			$student->email 			= Input::get('email');
			$student->phone 			= Input::get('phone');
			$student->address 			= Input::get('address');
			$student->hometown 			= Input::get('hometown');
			$student->work 				= Input::get('work');
			$student->company 			= Input::get('company');
			$student->webdesign   		= Input::get('webdesign');
			$student->graphicdesign 	= Input::get('graphicdesign');
			$student->illustration   	= Input::get('illustration');
			$student->threedmodel   	= Input::get('threedmodel');
			$student->branding   		= Input::get('branding');
			$student->photography  		= Input::get('photography');

			$student->photo 			= $photo_name;

			$student->save();
			return Redirect::to('/');
		}
		return View::make('frontend.editprofile', compact('student'));
	}

	public function contact()
	{
		$contact = new Contact();
		$contact->name = Input::get('name');
		$contact->email = Input::get('email');
		$contact->message = Input::get('message');

		if($contact->save()){
			return Redirect::to('/');
		}
	}
}
