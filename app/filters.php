<?php

use Symfony\Component\Security\Core\Util\StringUtils;
use Illuminate\Session\TokenMismatchException;

Route::filter('auth', function()
{
	if (!Auth::check())
        {
            return Redirect::to('/login');
        }
});

Route::filter('csrf', function() 
{
	if ( ! StringUtils::equals(Session::token(), Input::get('_token')))
	{
		throw new TokenMismatchException;
	}
});
