<?php namespace App\Controllers;

// Facades
use View;
use Gallery;

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
}