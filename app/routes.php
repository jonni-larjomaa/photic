<?php

//gallery index route
Route::get('/', array( 'uses' => 'App\\Controllers\\GalleryController@index', 'as' => 'home'));

// Image manipulation route
Route::get('/{imagename}/{width}/{height}', 'App\\Controllers\\GalleryController@image');

// routing for login actions.
Route::get('/login', array( 'uses' => 'App\\Controllers\\AuthController@showLogin', 'as' => 'login'));
Route::post('/login',array('uses' => 'App\\Controllers\\AuthController@doLogin', 'before' => 'csrf'));

Route::get('/signup',array( 'uses' => 'App\\Controllers\\AuthController@showSignup', 'as' => 'signup'));
Route::post('/signup',array( 'uses' => 'App\\Controllers\\AuthController@doSignup', 'before' => 'csrf'));

// gallery routes when logged in
Route::group(array('before' => 'auth'), function(){

    // image uploading
    Route::get('/upload', array( 'uses' => 'App\\Controllers\\UploadController@index', 'as' => 'upload'));
    Route::post('/upload', 'App\\Controllers\\UploadController@uploadImage');

    // User profile routes.
    Route::get('/profile', array( 'uses' => 'App\\Controllers\\UserController@showProfile', 'as' => 'profile'));
    Route::post('/profile', array( 'uses' => 'App\\Controllers\\UserController@updateProfile', 'as' => 'profile.update'));
    
    // route that logs you out
    Route::get('/logout', array( 'uses' => 'App\\Controllers\\AuthController@logout', 'as' => 'logout'));
});

Route::get('/about', array( 'as' => 'about', function(){
    return View::make('gallery.about');
}));