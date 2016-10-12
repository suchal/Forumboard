<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;

class cityController extends Controller
{
    public function index(){
        $cities = City::all();
        return view('admin.city.index', compact('cities'));
    }
    
    public function create(){
        return view('admin.city.create');
    }

    public function store(Request $req){
        $this->validate($req, ['name'=>'required']);

        City::create($req->all());
        return redirect('/admin/cities');
    }

    public function destroy(City $city){
        $city->delete();
        return redirect('/admin/cities');
    }
    



    
    
}
