<?php

//gallery index route
Route::get('/','GalleryController@index');
Route::get('/upload', 'UploadController@index');
Route::post('/upload', 'UploadController@uploadImage');
// Image manipulation route
Route::get('/{imagename}/{width}/{height}', 'GalleryController@image');

// routing for login actions.
Route::get('/login','AuthController@showLogin');
Route::post('/login','AuthController@handleLogin');

// gallery routes when logged in
Route::group(array('before' => 'auth'), function(){

    // route that logs you out
    Route::get('/logout',function(){
        Auth::logout();
        return Redirect::to('/login');
    });
});

