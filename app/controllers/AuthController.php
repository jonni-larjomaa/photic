<?php namespace App\Controllers;

// Facades
use Redirect;
use View;
use Input;
use Auth;

// Namespaces
use App\Controllers\BaseController;

class AuthController extends BaseController {
    
    public function showLogin()
    {   
        return View::make('login.index');
    }
    
    public function doLogin()
    {
       $attributes = array(
           'username' => Input::get('username'), 
           'password' => Input::get('password')
        );

       if(Auth::attempt($attributes))
       {
          return Redirect::to('/');
       }
       else
       {
           return Redirect::to('/login')->with(array('fail' => 'Wrong username or bad password!'));
       }
    }
    
    public function Logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
