<?php

namespace App\Http\Controllers;

use App\Followed_Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Followed_Post_Controller extends Controller
{
    public function followedposts_getPage(){
        $user_id = Auth::user()->id;

        $fp = Followed_Post::where('follower_id', '=', $user_id)->paginate(10);

        //get all posts
        $posts = array();
        foreach($fp as $f){
            $post = Followed_Post::where('post_id', '=', $f->post_id)->first();
            array_push($posts, $post);
        }
        $posts->paginate(10);

        return view('followedposts', compact('posts'));
    }

    public function followAPost($post_id){
        //add new followed post row
        $user_id = Auth::user()->id;

        $fp = new Followed_Post();
        $fp->follower_id = $user_id;
        $fp->post_id = $post_id;

        $fp->save();

        return redirect()->back();
    }

    public function unfollowAPost($post_id){
        //find followed post row that has same post id and user id, and delete it
        $user_id = Auth::user()->id;

        $fp = Followed_Post::where('post_id', '=', $post_id, '&', 'follower_id', '=', $user_id);
        $fp->delete();

        return redirect()->back();
    }
}
