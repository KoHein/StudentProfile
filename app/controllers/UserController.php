<?php 

class UserController extends BaseController
{
	public function register()
	{
		try
		{    	
			$destinationPath = 'uploads/students'; 
		    
		    $extension = Input::file('photo')->getClientOriginalExtension(); 

		    $photo_name = rand(11111,99999).'.'.$extension; 

			Input::file('photo')->move($destinationPath, $photo_name);


    		// Create the user
			$user = Sentry::createUser(array(
				'username'	=> Input::get('username'),
				'nickname'  => Input::get('nickname'),
				'email'     => Input::get('email'),
				'password'  => Input::get('password'),
				'phone'  	=> Input::get('phone'),
				'address'  	=> Input::get('address'),
				'hometown'  => Input::get('hometown'),
				'work'  	=> Input::get('work'),
				'company'  	=> Input::get('company'),
				'photo'		=> $photo_name,
				'activated' 		=> false

					// $student->photo 			= $photo_name;
				));

   			// Find the group using the group id
			$adminGroup = Sentry::findGroupById(2);

   			// Assign the group to the user
			$user->addGroup($adminGroup);

			return Redirect::to('/');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			echo 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			echo 'Group was not found.';
		}
	}
	public function activeduser()
	{
		$student = Sentry::findUserById(Input::get('id'));
		
		if ($student->attemptActivation($student->persist_code))
		{
			return Redirect::back();
		}
		else
		{
			return Redirect::back();
		}
	}

	public function editstudent()
	{

		$student = Sentry::findUserById(Input::get('id'));
		if (Request::isMethod('post'))
		{
		
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

			// $student->photo 			= $photo_name;

			$student->save();

			return Redirect::back();
		}
		return View::make('backend.edit', compact('student'));
	}	

		public function deletstudent()
	{
		$studentid = Input::get('id');
		$portfolios = Portfolio::where('studentid', '=', $studentid)->get();
		foreach ($portfolios as $portfolio) {
		Portfolio::destroy($portfolio->id);
		}
		User::destroy($studentid);

		return Redirect::back();
	}
}

