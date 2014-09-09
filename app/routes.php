<?php

//gallery index route
Route::get('/','GalleryController@index');

// Image manipulation route
Route::get('/{name}/{width}/{height}', function( $name, $width, $height){
    
    $img_path = Config::get("gallery.photo_path");
    $tb_path = Config::get("gallery.thumbnail_path");
    
    if(file_exists($tb_path."/".md5($name.$width.$height).".jpg")){
        $img = Image::make($tb_path."/".md5($name.$width.$height).".jpg");
        Log::info('fetched from cache!');
    }
    else{
        $img = Image::make($img_path."/".$name)->fit($width,$height);
        $img->save($tb_path."/".md5($name.$width.$height).".jpg");
        Log::info('fitted new image!');
    }
    
    return $img->response();
});
