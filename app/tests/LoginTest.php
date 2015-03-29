<?php

class LoginTest extends TestCase {

	/**
         * User that is not logged in should be redirected to login page
	 */
	public function testIsRedirectedToLoginPage()
	{
            Route::enableFilters();

            $this->call('GET', '/');

            $this->assertRedirectedTo('http://localhost/login');
	}
        
        /**
         * When user tries to login with bad password error is set to true
         */
        public function testLoginWithBadPasswordFails()
        {
            $this->call('POST','/login',array('password' => 'badpassword','username' => 'haat'));
            
            $this->assertViewHas('error',true);
        }
        
        /**
         * When user logs in with correct password it is redirected to 
         */
        public function testLoginWithCorrectPasswordSuccess()
        {
            $this->call('POST','/login',array('password' => 'MarryMe','username' => 'haat'));
            $this->assertRedirectedTo('http://localhost');
        }
}
