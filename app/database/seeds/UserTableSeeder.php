<?php 

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		// create Group
		try
		{
    		// Create the group
			$group = Sentry::createGroup(array(
				'name'        => 'Administrators',
				'permissions' => array(
					'admin' => 1,
					'users' => 1,
					),
				));
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
			echo 'Name field is required';
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
			echo 'Group already exists';
		}

		// create Group
		try
		{
    		// Create the group
			$group = Sentry::createGroup(array(
				'name'        => 'Students',
				'permissions' => array(
					'admin' => 0,
					'users' => 1,
					),
				));
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
			echo 'Name field is required';
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
			echo 'Group already exists';
		}

		//Create Admin User And Add to Group
		try
		{
   			// Create the user
			$user = Sentry::createUser(array(
				
				'email'     => 'admin@studentprofile.com',
				'password'  => 'password',
				'activated' => true,
				));
			$user->username ='MM Dev';
			$user->save();


    		// Find the group using the group id
			$adminGroup = Sentry::findGroupById(1);

   			 // Assign the group to the user
			$user->addGroup($adminGroup);
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

		//Create Admin User And Add to Group
		try
		{
   			// Create the user
			$user = Sentry::createUser(array(
				'email'     => 'kohein@gmail.com',
				'password'  => 'password',
				'activated' => true,
				));
			
			$user->username ='MgMgHein';
			$user->nickname ='KoHein';
			$user->phone ='09402605740';
			$user->address ='No.(240/A).4th Floor. Bagaya Street Yangon. Myanmar {Burma}.';
			$user->hometown ='Mandalay';
			$user->work ='Web And Android Application Developer';
			$user->company ='Za it service';
			$user->webdesign ='10';
			$user->graphicdesign ='30';
			$user->illustration ='100';
			$user->threedmodel ='4';
			$user->branding ='9';
			$user->photography ='79';

			$user->save();

    		// Find the group using the group id
			$adminGroup = Sentry::findGroupById(2);

   			 // Assign the group to the user
			$user->addGroup($adminGroup);
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

}
