<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use App\Http\Requests\ProfileUpdateRequest;
use App\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $admins = User::admins()->get();
        return view('admin.admins.index', compact('admins'));
    }
    public function create(){
        return view('admin.admins.create');
    }
    public function store(Request $req){
        $rules = [
            'username' => 'required',
            'password' => 'required|confirmed',
            'email'    => 'required|email'
        ];
        $this->validate($req, $rules);

        $newadmin = User::create([
            'username' => $req->username,
            'password' => bcrypt($req->password),
            'email'    => $req->email,
            'api_token'=> str_random(60)
        ]);
        $newadmin->is_admin = 1;
        $newadmin->save();
        return redirect('admin/admins');
    }
    public function edit($username){
        $user = User::where('username', $username)->first();
        $cities = City::all();
        return view('admin.admins.edit', compact('user', 'cities'));
    }
    public function update(ProfileUpdateRequest $req, $username){
        $user = User::where('username', $username)->first();
        $errors = $req->check($user);
        if(count($errors)) return back()->with('duplicates', $errors);
        $req->persist($user);
        return redirect('/admin/admins');

    }
    public function destroy($username){
        $user = User::where('username', $username)->first();
        $user->delete();
        return back();
    }
    
    
}
