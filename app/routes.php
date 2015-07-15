<?php

//gallery index route
Route::get('/','App\\Controllers\\GalleryController@index');

// Image manipulation route
Route::get('/{imagename}/{width}/{height}', 'App\\Controllers\\GalleryController@image');

// routing for login actions.
Route::get('/login','App\\Controllers\\AuthController@showLogin');
Route::post('/login','App\\Controllers\\AuthController@doLogin');

// gallery routes when logged in
Route::group(array('before' => 'auth'), function(){

    // image uploading
    Route::get('/upload', 'App\\Controllers\\UploadController@index');
    Route::post('/upload', 'App\\Controllers\\UploadController@uploadImage');

    // route that logs you out
    Route::get('/logout', 'App\\Controllers\\AuthController@logout');
});

