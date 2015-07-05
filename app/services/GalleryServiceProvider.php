<?php namespace App\Service;

use Illuminate\Support\ServiceProvider;

class GalleryServiceProvider extends ServiceProvider{
    
    public function register() 
    {
        $this->app->bind('gallery', '\App\Models\Gallery');
    }
}
