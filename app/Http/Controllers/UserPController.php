<?php

namespace App\Http\Controllers;
//namespace App

use App\User;
use App\UserP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserPController extends Controller
{
    public function login(Request $req){
        //Eloquent, Laravel equivalent of LINQ
        $userp = UserP::where('email', '=', $req->email)
            ->where('password', '=', $req->password)
            ->first(); //to ensure it only returns an object, not array of object with 1 object

        if($userp){
            //if user is not null/does exist in database, go to home page but
            Auth::login($userp);
            return view('home');
        }

        //if fail, return login view
        return view('login');
    }

    public function logout(){
        if(Auth::user()){
            Auth::logout();
            return view('home');
        }
    }

    public function login_get(){
        return view('login');
    }

    public function register(Request $req){
        $validator = Validator::make($req -> all(),[
                'name' => 'required|min:5',
                'email' => 'required|unique:user_ps|email',
                'password' => 'required|alpha_num|min:8',
                'gender' => 'required',
                'profile_picture' => 'required|image|mimes:jpeg,jpg,png'
                //'profile_picture' => 'required|image|mimetypes:image/jpeg,image/jpg,image/png'
            ]
        );

        //validation fail, return
        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd('aaaa'); diamond dice, show tulisan ini kalau semua berjalan lancar dan stop

        $p = new \App\UserP();
        $p->name = $req->name;
        $p->email = $req->email;
        $p->password = $req->password;
        $p->gender = $req->gender;

        $profile_picture = $req->file('profile_picture');
        $destinationPath = public_path('UsersUploadedImage'); //folder UsersUploadedImage ada di public
        $filename = $profile_picture->getClientOriginalName();
        $profile_picture->move($destinationPath, $filename);
        $p->profile_picture = 'UsersUploadedImage/'.$filename;

        $p->save();

        //make User equivalent


        //return to home page
        return redirect('/');

    }

    public function register_get(){
        return view('register');
    }

    public function getPaginate(){
        $users = UserP::Paginate(25);
        return view('manageusers', compact('users'));
    }
}
