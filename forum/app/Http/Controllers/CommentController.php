<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Notifications\CommentOnUsersPost;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function store($slug, Request $req){
    	$post = Post::findFromSlug($slug);
    	$rules = [''];
    	$this->validate($req, $rules);

    	$comment = new Comment($req->all());
    	$comment->user_id = $req->user()->id;
    	$post->comments()->save($comment);
        $post->user->notify(new CommentOnUsersPost($comment, $post));
    	return back();
    }

    public function destroy(Comment $comment){
    	$comment->delete();
    	return back();
    }
}
