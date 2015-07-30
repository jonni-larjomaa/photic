<?php namespace App\Controllers;

// Facades
use View;
use Request;
use Log;
use Config;

// namespaces
use App\Controllers\BaseController;

class UploadController extends BaseController {

    /**
     * 
     * @return View
     */
    public function index()
    {
        return View::make('upload.index');
    }

    /**
     * @return void
     */
    public function uploadImage()
    {
        $uploadedfile = Request::file('file');
        if($uploadedfile->isValid())
        {
            $uploadedfile->move(Config::get('gallery.photo_path'), $uploadedfile->getClientOriginalName());
            Log::info('Successfully saved file: ' . Config::get('gallery.photo_path'). $uploadedfile->getClientOriginalName());
        }
    }
}