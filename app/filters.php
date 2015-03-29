<?php

Route::filter('auth', function()
{
	if (!Auth::check())
        {
            return Redirect::to('/login');
        }
});
