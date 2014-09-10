<?php

use Illuminate\Auth\GenericUser;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;
use \Illuminate\Support\Facades\Hash;

class DummyUserProvider implements UserProviderInterface
{
    
    public function retrieveByCredentials(array $credentials) {
        
        return $this->dummyUser();
    }

    public function retrieveById($identifier)
    {
        return $this->dummyUser();
    }

    
    public function validateCredentials(\Illuminate\Auth\UserInterface $user, array $credentials) 
    {
        if(Hash::check($credentials['password'], $user->password) &&
                $credentials['username'] === $user->username)
        {
            return true;
        }
        
        return false;
    }
    
    private function dummyUser()
    {
        $attributes = array(
            'id' => 1,
            'username' => 'haat',
            'password' => Hash::make('MarryMe'),
            'name' => 'wedding-gallery',
        );
        
        return new GenericUser($attributes);                
    }
    
    public function retrieveByToken($identifier, $token) 
    {
        return new \Exception('not implemented');
    }

    public function updateRememberToken(\Illuminate\Auth\UserInterface $user, $token) 
    {
        return new \Exception('not implemented');
    }

}
