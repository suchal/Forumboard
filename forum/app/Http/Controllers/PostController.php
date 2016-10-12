<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct(Request $req){
    	$this->middleware('auth', ['except'=>'show']);
    }

    public function index(){
        $posts = Post::orderBy('is_sticky','desc')->orderBy('updated_at','desc')->paginate();
        $posts->load('user', 'category', 'type', 'city');
        return view('post.index', compact( 'posts'));


    }

    public function show($slug){
    	$post = Post::findFromSlug($slug);
    	$post->load('comments.user');
    	$photos = $post->photos;
    	return view('post.show', compact('post', 'photos'));
    }

    public function create(){
    	$categories = Category::all();
    	$types = Type::all();
        $cities = City::all();
    	return view('post.create', compact('categories', 'types', 'cities'));
    }

    public function store(CreatePostRequest $req){
    	$data = $this->getDataFromReq($req);
    	$post = new Post($data);
    	\Auth::user()->posts()->save($post);
    	return redirect('/posts/' . $post->getSlug());
    }

    public function edit($slug){
    	$post = Post::findFromSlug($slug);
		$this->authorize('edit', $post);
    	$categories = Category::all();
    	$types = Type::all();
        $cities = City::all();
    	return view('post.edit', compact('post', 'categories', 'types', 'cities'));

    }

    public function update(UpdatePostRequest $req, $slug){
    	$post = Post::findFromSlug($slug);
		$this->authorize('edit', $post);
    	$data = $this->getDataFromReq($req);
    	$post->update($data);
    	return redirect('/posts/'.$post->getSlug());
    }

    public function close($slug){
    	$post = Post::findFromSlug($slug);
		$this->authorize('edit', $post);
    	$post->is_open = false;
    	$post->save();
    	return back();
    }

    protected function getDataFromReq($req){
    	$data = $req->all();
    	if(key_exists('reply_allowed', $data)) $data['reply_allowed'] = 1;
    	else $data['reply_allowed'] = 0;
    	return $data;
    }

    public function search(Request $req){
        $query = $req->query;
        $results = Post::search($req->query)->paginate(10);

        return view('post.search', compact('results', 'query'));
    }    
    
}
