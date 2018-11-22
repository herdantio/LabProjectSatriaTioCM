<?php

namespace App\Http\Controllers;
//namespace App

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
            return view('home');
        }
    }
    public function register(Request $req){
        $validator = Validator::make($req -> all(),[
                'name' => 'required|min:5',
                'email' => 'required|unique:users|email',
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

        $u = new User();
        $u->name = $req->name;
        $u->email = $req->email;
        $u->password = $req->password;
        $u->gender = $req->gender;

        $profile_picture = $req->file('profile_picture');
        $destinationPath = public_path('UsersUploadedImage'); //folder UsersUploadedImage ada di public
        $filename = $profile_picture->getClientOriginalName();
        $profile_picture->move($destinationPath, $filename);
        $u->profile_picture = 'UsersUploadedImage/'.$filename;

        $u->save();

        //return to home page
        return redirect('/');
    }

    //for user pages, profile
    public function userProfile(){
        $u = Auth::user();
        return view('profile', compact('u'));
    }
    public function updateProfile(Request $req){
        $validator = Validator::make($req -> all(),[
                'name' => 'required|min:5',
                'email' => 'required|unique:users|email',
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

        $u = Auth::user();
        $u->name = $req->name;
        $u->email = $req->email;
        $u->password = $req->password;
        $u->gender = $req->gender;

        $profile_picture = $req->file('profile_picture');
        $destinationPath = public_path('UsersUploadedImage'); //folder UsersUploadedImage ada di public
        $filename = $profile_picture->getClientOriginalName();
        $profile_picture->move($destinationPath, $filename);
        $u->profile_picture = 'UsersUploadedImage/'.$filename;

        $u->save();

        //return to home page
        return redirect('/profile');
    }

    //for Admin pages, manageuser and edituser
    public function manageUsers(){
        $users = UserP::Paginate(25);
        return view('manageusers', compact('users'));
    }
    public function edit($id){
        $u = User::find($id);
        return view('edituser', compact('u'));
    }
    public function updateAdmin(Request $req, $id){
        $validator = Validator::make($req -> all(),[
                'name' => 'required|min:5',
                'email' => 'required|unique:users|email',
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

        $u = User::find($id);
        $u->name = $req->name;
        $u->email = $req->email;
        $u->password = $req->password;
        $u->gender = $req->gender;

        $profile_picture = $req->file('profile_picture');
        $destinationPath = public_path('UsersUploadedImage'); //folder UsersUploadedImage ada di public
        $filename = $profile_picture->getClientOriginalName();
        $profile_picture->move($destinationPath, $filename);
        $u->profile_picture = 'UsersUploadedImage/'.$filename;

        $u->save();

        //return to home page
        return redirect('/profile');
    }

    public function register_get(){
        //only redirect to register page
        return view('register');
    }
    public function login_get(){
        //only redirects to login page
        return view('login');
    }

}
