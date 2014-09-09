<?php

class GalleryController extends BaseController {

	public function index()
        {
            $imgs = $this->fetchImagesArray();
            return View::make('gallery')->with($imgs);    
	}
        
        private function fetchImagesArray(){
            
            $photo_path = Config::get('gallery.photo_path');
            
            $photos = array_map(
                    function($photo)
                    { 
                        $img = explode("/",$photo);
                        return end($img);
                        
                    },
                    glob($photo_path.'/*')
            );
            
            return array('images' => $photos);
        }

}
