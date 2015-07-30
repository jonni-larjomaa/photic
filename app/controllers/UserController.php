<?php namespace App\Controllers;

//facades
use Auth;
use View;
use Validator;
use Input;
use Redirect;
use Hash;

//namespaces
use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{

    /**
     * validator rules
     * @var array 
     */
    protected $validators = array(
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required|min:8',
                );
    
    /**
     * validator messages
     * @var array 
     */
    protected $messages = array(
                'required' => ':attribute field is required!',
                'unique' => ':attribute is already in use!',
                'password.min' => 'Passwords must be atleas 8 characters long!',
                'confirmed' => 'Passwords do not match!',
                );
    
    /**
     * 
     * @return View
     */
    public function showProfile()
    {
        return View::make('user.profile')
                ->with(array('user' => Auth::user()));
    }
    
    /**
     * 
     * @return Redirect
     */
    public function updateProfile()
    {
        
        $validator = Validator::make(Input::all(), $this->validators, $this->messages);
       
        if($validator->fails())
        {
            return Redirect::route('profile')
                    ->withErrors($validator->messages())
                    ->withInput(Input::except('password', 'password_confrimation'));;
        }
        else
        {
            $user = User::find(Auth::user()->id);
            
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            
            $user->save();
            
            return Redirect::route('profile')
                    ->with(array('msg' => 'Update successful.'));
        }
    }
}
