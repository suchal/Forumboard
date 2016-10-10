<?php

namespace App;

use App\Post;
use App\Photo;
use Illuminate\Http\UploadedFile;

class AddPhotosToPost{

	private $post;
	private $file;


	public function __construct(Post $post, UploadedFile $file)
	{
		$this->file = $file;
		$this->post = $post;
	}

	public function save(){
		// create a new photo instance
		$photo = new Photo(['name'=>$this->makeName()]);

		// save it to the database
		$this->post->photos()->save($photo);

		// move the file to the storage
		$this->file->move($photo->dir, $photo->name);

		// create the thumbnail
		\Image::make($photo->path)
				->fit(200)
				->save($photo->thumbnail_path);

	}

	protected function makeName(){
		return time().'-'.$this->file->getClientOriginalName();
	}
	
}