<?php

Route::get('/{name}/{width}/{height}', function( $name, $width, $height){
    
    $img_path = Config::get("gallery.photo_path");
    $tb_path = Config::get("gallery.thumbnail_path");
    
    $img = Image::make($img_path."/".$name)->resize($width,$height);
    $img->save($tb_path."/".md5($name.$width.$height).".jpg");
    
    return $img->response();
});
