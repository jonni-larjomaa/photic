<?php

use Illuminate\Console\Command;

class PhotosIndex extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'photos:index';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generates thumbnails for the images and populates db with image data';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
            $images_path = Config::get('gallery.photo_path');
            $images = glob($images_path."/*");
            
            foreach($images as $image){
                $img = $this->generateThumbnail($image, 300, 200);
            }
            
	}
        
        /**
         * 
         * @param string $image
         * @param int $width
         * @param int $height
         * @return Image
         */
        private function generateThumbnail($image, $width, $height){
           
            $tb_path = Config::get('gallery.thumbnail_path');
            $tb_hash = md5($image.$width.$height);
            
            $img = Image::make($image)->resize($width,$height);
            $img->save($tb_path."/".$tb_hash.".jpg");
            
            return $img;
            
        }

}
