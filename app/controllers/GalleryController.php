<?php namespace App\Controllers;

// Facades
use View;
use Gallery;

// namespaces
use App\Controllers\BaseController;

class GalleryController extends BaseController {

	public function index()
    {
        return View::make('gallery.index')
            ->with(array('images' => Gallery::getImages()));
	}

    public function image($image, $width, $height)
    {
        return Gallery::getFittedImage($image, $width, $height)->response();
    }
}