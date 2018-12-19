<?php

namespace App\Http\Controllers;

use App\Category;
use App\Followed_Post;
use App\Post_Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Cookie;

class Post_Image_Controller extends Controller
{
     /*get*/public function insertPost_getPage(){
        //only redirects to insertpost page
        $c = Category::All();
        return view('insertpost', compact('c'));
    }
     public function home_getPage(){

         //remember me was on, login immediately
         if(Cookie::get('user_email') && Cookie::get('user_password')){

             $user = User::where('email', '=', Cookie::get('user_email'))
                 ->where('password', '=', Cookie::get('user_password'))
                 ->first();

             if($user){
                 Auth::login($user);
             }
         }

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
         $i->caption = $req->caption;
         $i->category_id = $req->category;
         $i->owner_id = $u->id;
         $i->price = $req->price;

         $post_picture = $req->file('post_image');
         $destinationPath = public_path('UsersPostedImage'); //folder UsersPostedImage ada di public
         $filename = $post_picture->getClientOriginalName();
         $post_picture->move($destinationPath, $filename);
         $i->picture = 'UsersPostedImage/'.$filename;

         $i->save();
         return redirect('/');
     }

     public function edit($id){
         $p = Post_Image::find($id);
         return view('updatepost', compact('p'));
     }
     public function updateImage(Request $req, $id){
         $validator = Validator::make($req -> all(),[
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
         $i->price = $req->price;

         $post_picture = $req->file('post_image');
         $destinationPath = public_path('UsersPostedImage'); //folder UsersUploadedImage ada di public
         $filename = $post_picture->getClientOriginalName();
         $post_picture->move($destinationPath, $filename);
         $i->picture = 'UsersPostedImage/'.$filename;

         $i->save();
         return redirect('/');
     }

     public function deleteImage($post_id){
         $p = Post_Image::find($post_id);

        //can only be deleted by the owner
         if(Auth::user()->id != $p->owner_id){
             return redirect()->back();
         }

        $p->delete();

        return redirect()->back();
    }

     public function search(Request $req){
         //search post images by title or description in home page
//         $search = $req->get('keyword');
         $search = $req->keyword;

         //select * from Post_Image where name LIKE %<string to search>%
         //$posts = Post_Image::where('title', 'LIKE', '%'.$search.'%', 'AND', 'caption', 'LIKE', '%'.$search.'%') -> paginate(10);
         $posts = Followed_Post::where([['title', 'LIKE', '%'.$search.'%'], ['caption', 'LIKE', '%'.$search.'%']])->paginate(10);
         $posts->appends($req->only('keyword')); //append URL so only relevant search appear

         return view('searchresult', compact('posts'));
     }

     public function myposts_getPage(){
         $id = Auth::user()->id;

         //select * from Post_Image where name LIKE %<string to search>%
         //$posts = Post_Image::where('owner_id', 'EQUALS', $id) -> paginate(10);
         $posts = Post_Image::where('owner_id', '=', $id) -> paginate(10);

         return view('myposts', compact('posts'));
     }

     public function viewDetail($post_id){ //same as showComment function in post_image_controller
         $post = Post_Image::find($post_id)->first();
         $comments = Comment::where('post_id', '=', $post_id) -> paginate(10);
         $owner_id = $post->owner_id;
         $owner_name = User::where('id', '=', $owner_id)->first();
         $category_id = $post->category_id;
         $category_name = Category::where('id', '=', $category_id);

         //if already followed
         $user_id = Auth::user()->id;
         $fpost = Followed_Post::where([['post_id', '=', $post_id], ['follower_id', '=', $user_id]])->first()
         $followed = true;
         if($fpost == null){
             $followed = false;
         }

         //pack everything inside
         $data = ['post_data' => $post, 'comments_data' => $comments, 'owner_name'=> $owner_name,
             'followed' => $followed, 'category_name' => $category_name];

         return view('postdetail', compact('data'));
     }

}