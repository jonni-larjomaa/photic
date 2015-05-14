<?php

class GalleryController extends BaseController {

	public function index()
    {
            $imgs = $this->fetchImagesArray();
            return View::make('gallery')->with($imgs);    
	}

    public function image($imagename, $width, $height)
    {
        $img_path = Config::get("gallery.photo_path");
        $tb_path = Config::get("gallery.thumbnail_path");

        Log::info('Loading image: '.$imagename . ' widht: '. $width . ' height: ' . $height);

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
    }

    private function fetchImagesArray(){

        $photo_path = Config::get('gallery.photo_path');

        $photos = array_map(
            function($photo) {
                $img = explode("/",$photo);
                return end($img);
            },
            glob($photo_path.'/*')
        );

        return array('images' => $photos);
    }

}
