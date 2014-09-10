<?php

class AuthController extends BaseController {
    
    public function showLogin()
    {
        if(Auth::check()) return Redirect::to('/');
        
        return View::make('login')->with(array('error' => false));
    }
    
    public function handleLogin()
    {
       $attributes = array(
           'username' => Input::get('username'), 
           'password' => Input::get('password')
        );

       if(Auth::attempt($attributes))
       {
          return Redirect::to('/');
       }
       
       return View::make('login')->with(array('error' => true));
    }
}
