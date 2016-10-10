<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function __construct(){
    }

    public function index(Request $req){
    	if(! $user = User::where('api_token', $req->api_token)->first())
    		abort(401, 'unauthorized');
    	// Auth::login($user);
    	return $user->unreadNotifications;
    }
}
