<?php
/**
 * Created by PhpStorm.
 * User: jonni
 * Date: 23/05/15
 * Time: 10:34
 */

class UploadController extends BaseController {

    public function index()
    {
        return View::make('upload.index');
    }

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