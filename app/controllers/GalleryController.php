<?php namespace App\Controllers;

// Facades
use View;
use Gallery;
use Input;
use Response;

// namespaces
use App\Controllers\BaseController;

class GalleryController extends BaseController {

    /**
     * 
     * @return View
     */
	public function index()
    {
        return View::make('gallery.index')
            ->with(array('images' => Gallery::getImages()));
	}

    /**
     * 
     * @param string $image
     * @param int $width
     * @param int $height
     * @return Respone
     */
    public function image($image, $width, $height)
    {
        return Gallery::getFittedImage($image, $width, $height)->response();
    }
    
    /**
     * @return Response|json
     */
    public function removeImage()
    {
        $image = basename(Input::get('photo'));
         
        if(Gallery::removeImage($image))
        {
            return Response::json(array('success' => true));
        }
        else
        {
            return Response::json(array('success' => false));
        }
    }
}