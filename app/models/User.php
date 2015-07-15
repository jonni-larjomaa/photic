<?php namespace App\Models;

// Facades
use Eloquent;

// namespaces
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class User extends Eloquent implements UserInterface {
    
    use UserTrait;
    
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /**
     * Mass assignment enabled fields
     *
     * @var array
     */
    protected $fillable = array('email', 'password','username');
                
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
}
