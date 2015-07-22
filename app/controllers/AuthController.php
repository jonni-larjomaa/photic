<?php namespace App\Controllers;

// Facades
use Redirect;
use View;
use Input;
use Auth;
use Validator;
use Log;

// Namespaces
use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController {
    
    protected $validators = array(
                'email' => 'required|email',
                'username' => 'required|unique:users',
                'password' => 'required|min:8',
                );
    
    protected $messages = array(
                'required' => ':attribute field is required!',
                'unique' => ':attribute is already in use!',
                'password.min' => 'Passwords must be atleas 8 characters long!',
                'email' => 'Not valid email address!'
                );
    
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
          Log::info(Input::get('username') . ' logged in from: ' . $_SERVER['REMOTE_ADDR']);
          return Redirect::route('home');
       }
       else
       {
           Log::info(Input::get('username') . ' login failed, ip: ' . $_SERVER['REMOTE_ADDR']);
           return Redirect::route('login')->with(array('msg' => 'Wrong username or bad password!'));
       }
    }
    
    /**
     * 
     * @return Redirect
     */
    public function Logout()
    {
        Log::info(Auth::user()->username.' Logged out');
        
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
       
        $validator = Validator::make(Input::all(), $this->validators, $this->messages);
       
        if($validator->fails())
        {
            return Redirect::route('signup')
                    ->withErrors($validator->messages())
                    ->withInput(Input::except('password'));;
        }
        else
        {
            User::create(Input::all());
            return Redirect::route('login')
                    ->with(array('msg' => 'Registration success, please login'));
        }
    }
}
