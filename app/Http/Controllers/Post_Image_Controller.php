<?php

namespace App\Http\Controllers;

use App\Post_Image;
use Illuminate\Http\Request;

class Post_Image_Controller extends Controller
{
     /*get*/public function insertPost() {return view('insertpost');}
     /*post*/ public function postImage(Request $req){
         $validator = validator::make($req -> all(),[
             //Validasi
             'title' => 'required|max:200|min:20,',
             'caption' => 'required',
             'post_picture' => 'required|image|mimes:jpeg,jpg,png',
             'price' => 'required|numeric',
             'category' => 'required',
                ]
             );

         if($validator -> fails()){
             return redirect()->back()->withErrors($validator)->withInput();
         }

         $u = Auth::user();
         $i = new Post_Image();


         $i->title = $req->title;
         $i->price = $req->caption;
         $i->title = $req->title;
         $i->category = $req->category;
         $i->owner_id = $u->id;
         $i->price = $u->price;

         $post_picture = $req->file('post_image');
         $destinationPath = public_path('UsersUploadedImage'); //folder UsersUploadedImage ada di public
         $filename = $post_picture->getClientOriginalName();
         $post_picture->move($destinationPath, $filename);
         $i->picture = 'UsersUploadedImage/'.$filename;

         $i->save();
     }
     public function updateImage(){}
     public function destroyImage($id)
    {
        //ngancurin data?
        $p = Post_Image::find($id);
        //Product::destroy($id);
        $p->delete();

        return redirect('/');
    }
}