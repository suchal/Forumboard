<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ProfileUpdateRequest;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function show($username){
        $user = User::where('username', $username)->first();
        if($user == null) abort(404, 'The user is not found');
        if($user->id == \Auth::user()->id) return redirect('/profile');
        return view('profile.show', compact('user'));        
    }

    public function index(){
    	$user = \Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit(){
    	$data = \Auth::user();
    	return view('profile.edit', compact('data'));
    }

    public function update(ProfileUpdateRequest $req){
    	$errors = $req->check();
    	if(count($errors)) return back()->with('duplicates', $errors);

    	$req->persist();
    	return redirect('/profile');
    }
}
