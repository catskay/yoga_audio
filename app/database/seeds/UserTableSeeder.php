<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//DB::table('users')->delete();
		User::create(array(
            'name'     => 'Kay Wang',
            'email'    => 'catskay@gmail.com',
            'password' => Hash::make('yogayoga'),
            'type'	   => 'public',
        ));
		User::create(array(
			'name'     => 'Luke Burtch',
			'email'    => 'burtlu01@gettysburg.edu',
			'password' => Hash::make('itsme'),
			'type'	   => 'public',
		));
		User::create(array(
			'name'     => 'Phoebe Eng',
			'email'    => 'engph01@gettysburg.edu',
			'password' => Hash::make('gettcoll'),
			'type'	   => 'public',
		));
                User::create(array(
			'name'     => 'Luke Burtch',
			'email'    => 'onethousandeight@yahoo.com',
			'password' => Hash::make('itsstillme'),
			'type'	   => 'public',
		));
                User::create(array(
			'name'     => 'Tony Stark',
			'email'    => 'tony@starkindustries.com',
			'password' => Hash::make('ironman'),
			'type'	   => 'admin',
		));
                User::create(array(
			'name'     => 'Steve Rogers',
			'email'    => 'steve@goarmy.com',
			'password' => Hash::make('cap'),
			'type'	   => 'public',
		));
                User::create(array(
            'name'     => 'Kamini Desai',
            'email'    => 'kamini@kaminidesai.com',
            'password' => Hash::make('password'),
            'type'	   => 'admin',
        ));
	}

}
