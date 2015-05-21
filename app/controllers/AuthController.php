<?php 

class AuthController extends BaseController
{
	public function login()
	{
		$inputs = Input::get();
		$users = Sentry::findAllUsersWithAccess(array('admin'));

		try
		{
   			// Login credentials
			$credentials = array(
				'email'    => Input::get('email'),
				'password' =>  Input::get('password'),
				);

    		// Authenticate the user
			$user = Sentry::authenticate($credentials, false);
			$user = Sentry::findUserByID($user->id);
			$admin = Sentry::findGroupByName('Administrators');

			if(!$user->inGroup($admin))
			{
				return Redirect::to('/');
			}else
			{
				return Redirect::to('/admin');
			}
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			echo 'User is not activated.';
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			echo 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			echo 'User is banned.';
		}

	}

	public function logout()
	{
		Sentry::logout();
		return Redirect::to('/');
	}
}