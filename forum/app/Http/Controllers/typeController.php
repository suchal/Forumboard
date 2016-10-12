<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Type;
use Illuminate\Http\Request;

class typeController extends Controller
{
    public function index(){
        $types = Type::all();
        return view('admin.type.index', compact('types'));
    }
    
    public function create(){
        return view('admin.type.create');
    }

    public function store(Request $req){
        $rules = [
            'title'         => 'required',
            'description'   => 'required',
            'keywords'      => 'required',
        ];
        $this->validate($req, $rules);
        $type = Type::create($req->all());
        return redirect('/admin/types');
    }

    public function destroy(Type $type){
        $type->delete();
        return redirect('/admin/types');
    }
    
}
