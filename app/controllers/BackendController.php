<?php 
class BackendController extends BaseController
{
	public function index()
	{
		$user = Sentry::getUser();		
	    $group = Sentry::findGroupByName('Students');
		$students = Sentry::findAllUsersInGroup($group);
		$not_activited_students = array() ;

   		foreach ($students as  $student) {
   			if($student->isActivated())
   			{
   				$actived_students[] = $student;
   			}
   		}
   		foreach ($students as  $student) {
   			if(!$student->isActivated())
   			{
   				$not_activited_students[] = $student;
   			}
   		} 		
   		
		return View::make('backend.home', compact(
							'actived_students',
							'not_activited_students',
							'user'));
	}

	public function students()
	{
		$user = Sentry::getUser();		
		$group = Sentry::findGroupByName('Students');
		$students = Sentry::findAllUsersInGroup($group);

		return View::make('backend.students', compact('students','user'));	
	}

	public function portfolios()
	{
		$user = Sentry::getUser();		
		$portfolios = Portfolio::all();

		return View::make('backend.portfolios', compact('portfolios','user'));	
	}



	public function profile()
	{
		$user = Sentry::getUser();

		if (Request::isMethod('post'))
		{
		 	$user->username = Input::get('username');
		 	$user->nickname = Input::get('nickname');
		 	$user->email 	= Input::get('email');
		 	$user->phone 	= Input::get('phone');
		 	$user->address 	= Input::get('address');
		 	$user->hometown = Input::get('hometown');
		 	$user->work 	= Input::get('work');
		 	$user->company 	= Input::get('company');
		 	$user->photo 	= Input::get('photo');

		 	$user->save();
		}
		return View::make('backend.profile', compact('user'));	
	}

	public function contacts()
	{
		$user = Sentry::getUser();
		$contacts = Contact::all();
		return View::make('backend.contacts', compact('contacts','user'));
	}
	public function contactDetail()
	{
		$user = Sentry::getUser();
		$contact = Contact::find(Input::get('id'));
		return View::make('backend.contactdetail', compact('contact','user'));

	}
	public function deleteContact()
	{
		Contact::destroy(Input::get('id'));
		return Redirect::back();
	}

	public function deleteStudent()
	{
		student::destroy(Input::get('id'));
		return Redirect::back();
	}
}