<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\TempUser;
use App\Events\AccountMade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    protected $redirectTo = '/';
    public function create(){
        return view('auth.register');
    }
    public function store(Request $req){
        $rules = [
            'username' => 'required|max:255|unique:users|unique:temp_users',
            'email' => 'required|email|max:255|unique:users|unique:temp_users',
            'password' => 'required|min:6|confirmed',
        ];
        $this->validate($req, $rules);
        $data = [];
        $data['username'] = $req->username;
        $data['email'] = $req->email;
        $data['password'] = bcrypt($req->password);
        $data['token'] = md5(time().$data['username'].'mykey');
        $tempUser = TempUser::create($data);
        event(new AccountMade($tempUser));
        return redirect('/register/confirm');
    }

    public function verify(TempUser $tempuser, $token){
        if($tempuser->token != $token){
            abort('404', 'This URL does not exist');
        }
        $user = User::create([
            'username' => $tempuser->username,
            'email' => $tempuser->email,
            'password' => $tempuser->password,
            'api_token' => str_random(60),
        ]);
        \Auth::login($user);
        $tempuser->delete();
        return redirect($this->redirectTo);
    }

    public function confirm(){
        return view('auth.confirm');
    }
}
