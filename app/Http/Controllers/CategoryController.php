<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function manage_getPage(){
        $c = Category::paginate(10);

        //if no data (incomplete)
        if(!$c){
            $ca = new Category();
            $ca->id = 0;
            return view('managecategories', compact('ca'));
        }

        return view('managecategories', compact('c'));
    }

    public function insert_getPage(){
        return view('insertcategories');
    }
    public function add(Request $req){
        $validator = Validator::make($req -> all(),[
                'name' => 'required|min:3|max:20',
            ]
        );

        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $c = new Category();
        $c->name = $req->name;

        $c->save();
        return redirect('/managecategories');
    }

    public function edit($id){
        $c = Category::find($id);
        return view('updatecategories', compact('c'));
    }
    public function update(Request $req, $id){
        $validator = Validator::make($req -> all(),[
                'name' => 'required|min:3|max:20',
            ]
        );

        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $c = Category::find($id);
        $c->name = $req->name;

        $c->save();
        return redirect('/managecategories');
    }

    public function delete($id){
        $c = Category::find($id);
        $c->delete();

        return redirect('/managecategories');
    }
}
