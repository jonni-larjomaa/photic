<?php namespace App\Models;

/**
 * Used Facades.
 */
use \Image;
use \Config;
use \Log;

class Gallery {
    
    /**
     *
     * @var string
     */
    private $imagePath;
    
    /**
     *
     * @var string
     */
    private $thumbnailPath;
    
    /**
     * 
     */
    public function __construct() 
    {
        $this->imagePath = Config::get("gallery.photo_path");
        $this->thumbnailPath = Config::get("gallery.thumbnail_path");
    }
    
    /**
     * 
     * @return array
     */
    public function getImages()
    {
        $images = array_map(
            function($photo) {
                $img = explode("/",$photo);
                return end($img);
            },
            glob($this->imagePath.'/*')
        );

        return $images;
    }
    
    /**
     * 
     * @param string $image
     * @param int $width 
     * @param int $height
     * @return Image
     */
    public function getFittedImage( $image, $width, $height)
    {    
        Log::info('Loading image: '.$image . ' widht: '. $width . ' height: ' . $height);

        if(file_exists($this->thumbnailPath.'/'.md5($image.$width.$height).'.jpg'))
        {
            $img = Image::make($this->thumbnailPath.'/'.md5($image.$width.$height).'.jpg');
            Log::debug('Image '.$img->filename. 'fetched from cache');
        }
        else
        {
            $img = Image::make($this->imagePath.'/'.$image)->fit($width,$height);
            $img->save($this->thumbnailPath.'/'.md5($image.$width.$height).'.jpg');
            Log::debug('Created new thumbnail from image: '.$img->filename);
        }
        
        return $img;
    }
    
    /**
     * 
     * @param string $image absolute path to image
     * @return array exif data as array
     */
    public function getExifData( $image ){
        
        return Image::make($this->imagePath."/".$image)->exif();
    }
}
