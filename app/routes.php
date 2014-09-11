<?php

# routing for login actions.
Route::get('/login','AuthController@showLogin');
Route::post('/login','AuthController@handleLogin');

# gallery routes when logged in
Route::group(array('before' => 'auth'), function(){

    //gallery index route
    Route::get('/','GalleryController@index');

    // Image manipulation route
    Route::get('/{imagename}', function( $imagename ){

        $img_path = Config::get("gallery.photo_path");
        $tb_path = Config::get("gallery.thumbnail_path");

        if(file_exists($tb_path."/".md5($imagename."300").".jpg")){
            $img = Image::make($tb_path."/".md5($imagename."300").".jpg");
            Log::info('fetched from cache!');
        }
        else{
            $img = Image::make($img_path."/".$imagename)->fit(300,300);
            $img->save($tb_path."/".md5($imagename."300").".jpg");
            Log::info('fitted new image!');
        }

        return $img->response();
    }); 
});

# route that logs you out
Route::get('/logout',function(){

    Auth::logout();
    return Redirect::to('/login');
});