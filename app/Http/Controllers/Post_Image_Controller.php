<?php

namespace App\Http\Controllers;

use App\Post_Image;
//use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Post_Image_Controller extends Controller
{
     /*get*/public function insertPost_getPage(){
        //only redirects to insertpost page
        return view('insertpost');
    }
     public function home_getPage(){
         $p = Post_Image::paginate(10);
         return view('home', compact('p'));
     }

     /*post*/ public function postImage(Request $req){ //store
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
         $destinationPath = public_path('UsersPostedImage'); //folder UsersPostedImage ada di public
         $filename = $post_picture->getClientOriginalName();
         $post_picture->move($destinationPath, $filename);
         $i->picture = 'UsersPostedImage/'.$filename;

         $i->save();
         return redirect('/');
     }

     public function updateImage(Request $req, $id){
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
         $i = Post_Image::find($id);

         $i->title = $req->title;
         $i->price = $req->caption;
         $i->title = $req->title;
         $i->category = $req->category;
         $i->owner_id = $u->id;
         $i->price = $u->price;

         $post_picture = $req->file('post_image');
         $destinationPath = public_path('UsersPostedImage'); //folder UsersUploadedImage ada di public
         $filename = $post_picture->getClientOriginalName();
         $post_picture->move($destinationPath, $filename);
         $i->picture = 'UsersPostedImage/'.$filename;

         $i->save();
         return redirect('/');
     }

     public function deleteImage($id){
        //ngancurin data?
        //Post_Image::destroy($id);
        $p = Post_Image::find($id);
        $p->delete();

        return redirect('/');
    }
}