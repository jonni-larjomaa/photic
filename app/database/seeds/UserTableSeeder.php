<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();
        
        foreach ($this->provider() as $user) 
        {
            DB::table('users')->insert($user);
        }
    }
    
    /**
     * 
     * @return array
     */
    public function provider()
	{
		return array(
			array(
				'email' => 'teppo@example.com',
				'password' => Hash::make('123'),
				'username' => 'teppo.testaaja',
			),
			array(
				'email' => 'maija@example.com',
				'password' => Hash::make('123'),
				'username' => 'maija.testaaja',
			),

		);
	}
}
