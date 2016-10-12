<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    
    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $req){
        $rules = [
            'title'         => 'required',
            'description'   => 'required',
            'icon'          => 'required|image|max:5000',
            'keywords'      => 'required',
        ];
        $this->validate($req, $rules);
        $name = $this->makeName($req->file('icon'));
        $data = [];
        $data['title'] = $req->title;
        $data['description'] = $req->description;
        $data['icon_path'] = Category::$dir . $name;

        $category = Category::create($data);
        $req->file('icon')->move(Category::$dir, $name);

        return redirect('/admin/categories');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect('/admin/categories');
    }

    protected function makeName($file){
        return time().'-'.$file->getClientOriginalName();
    }


}