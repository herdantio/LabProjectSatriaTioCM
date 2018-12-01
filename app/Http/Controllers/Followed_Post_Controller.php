<?php

namespace App\Http\Controllers;

use App\Followed_Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Followed_Post_Controller extends Controller
{
    public function followedposts_getPage(){
        $user_id = Auth::user()->id;

        $fp = Followed_Post::where('follower_id', 'EQUALS', $user_id);

        //get all posts
        $posts = null;
        foreach($fp as $f){
            $posts += Followed_Post::where('post_id', 'EQUALS', $f->post_id);
        }
        $posts->paginate(10);

        return view('followedposts', compact('posts'));
    }
}
