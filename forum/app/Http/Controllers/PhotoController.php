<?php

namespace App\Http\Controllers;

use App\AddPhotosToPost;
use App\Http\Requests;
use App\Http\Requests\AddPhotoRequest;
use App\Post;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
	public function store($slug, AddPhotoRequest $req){
		$post = Post::findFromSlug($slug);
		(new AddPhotosToPost( $post, $req->file('file') ))->save();	
	}
}
