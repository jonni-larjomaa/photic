<?php namespace App\Controllers;

// Facades
use Redirect;
use View;
use Input;
use Auth;

// Namespaces
use App\Controllers\BaseController;

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
        return View::make('login.index');
    }
    
    /**
     * 
     * @return Redirect
     */
    public function doSignup()
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
}
