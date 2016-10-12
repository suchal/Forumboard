<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Term;
use Illuminate\Http\Request;

class termController extends Controller
{
    
    public function index(){
        $terms = Term::orderBy('created_at', 'desc')->first();
        return view('admin.term.index', compact('terms'));
    }

    public function update(Request $req){
        $this->validate($req, ['terms'=>'required']);
        Term::create($req->all());

        return redirect('admin/terms');
    }
    
    
    
}
