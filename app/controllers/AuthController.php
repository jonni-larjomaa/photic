<?php namespace App\Controllers;

// Facades
use Redirect;
use View;
use Input;
use Auth;

// Namespaces
use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController {
    
    /**
     * 
     * @return View
     */
    public function showLogin()
    {   
        return View::make('login.index');
    }
    
    /**
     * 
     * @return Redirect
     */
    public function doLogin()
    {
       $attributes = array(
           'username' => Input::get('username'), 
           'password' => Input::get('password')
        );

       if(Auth::attempt($attributes))
       {
          return Redirect::route('home');
       }
       else
       {
           return Redirect::route('login')->with(array('fail' => 'Wrong username or bad password!'));
       }
    }
    
    /**
     * 
     * @return Redirect
     */
    public function Logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }
    
    /**
     * 
     * @return View
     */
    public function showSignup()
    {   
        return View::make('login.signup');
    }
    
    /**
     * 
     * @return Redirect
     */
    public function doSignup()
    {
       $attributes = array(
           'username' => Input::get('username'), 
           'password' => Input::get('password'),
           'email'    => Input::get('email'),
        );

       if(User::create($attributes))
       {
          return Redirect::route('login');
       }
       else
       {
           return Redirect::route('signup')->with(array('fail' => 'Wrong username or bad password!'));
       }
    }
}
