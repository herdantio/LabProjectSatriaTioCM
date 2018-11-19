<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $req){
        //Eloquent, Laravel equivalent of LINQ
        $user = User::where('email', '=', $req->email)
            ->where('password', '=', $req->password)
            ->first(); //to ensure it only returns an object, not array of object with 1 object

        if($user){
            //if user is not null/does exist in database, go to home page but
            Auth::login($user);
            return view('home');
        }

        //if fail, return login view
        return view('login');
    }

    public function logout(){
        if(Auth::user()){
            Auth::logout();
            return view('welcome');
        }
    }

    public function login_get(){
        return view('login');
    }

    public function register(Request $req){
        $validator = Validator::make($req -> all(),[
                'name' => 'required|min:5',
                'email' => 'required|unique|email',
                'password' => 'required|alpha_num|min:8',
                'gender' => 'required',
                'profile_picture' => 'required|image|mimetypes:image/jpeg,image/bmp,image/png'
            ]
        );

        //validation fail, return
        if($validator -> fails()){
            return redirect(back()->withErrors($validator)->withInput());
        }

        $p = new User();
        $p->name = $req->name;
        $p->email = $req->email;
        $p->password = $req->password;
        $p->gender = $req->gender;

        $picture = $req->file('picture');
        $destinationPath = public_path('images');
        $filename = $picture->getClientOriginalName();
        $picture->move($destinationPath, $filename);

        //$p->picture = 'images/'.$filename;
        $p->profile_picture = 'UploadImagesUser/.$filename';

        $p->save();
        return redirect('/');

    }

    public function register_get(){
        return view('register');
    }
}
