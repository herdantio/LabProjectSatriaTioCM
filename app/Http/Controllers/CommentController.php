<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post_Image;
use App\User;
use App\Category;
use App\Followed_Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function showComments($post_id){
        //$comments = Comment::find($post_id);
        //$comments = Comment::where('post_id', 'EQUALS', $post_id) -> paginate(10);
        $post = Post_Image::find($post_id)->first();
        $comments = Comment::where('post_id', '=', $post_id) -> paginate(10);
        $owner_id = $post->owner_id;
        $owner_name = User::where('id', '=', $owner_id)->first();
        $category_id = $post->category_id;
        $category_name = Category::where('id', '=', $category_id);

        //if already followed
        $user_id = Auth::user()->id;
        $fpost = Followed_Post::where('post_id', '=', $post_id, '&', 'follower_id', '=', $user_id)->first();
        $followed = true;
        if($fpost == null){
            $followed = false;
        }

        //pack everything inside
        $data = ['post_data' => $post, 'comments_data' => $comments, 'owner_name'=> $owner_name,
            'followed' => $followed, 'category_name' => $category_name];

        return view('postdetail', compact('data'));
    }

    public function addComment(Request $req, $post_id){
        $validator = Validator::make($req -> all(),[
                'comment_text' => 'required|max:250'
            ]
        );

        //validation fail, return
        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $c = new Comment();
        $c->post_id = $post_id;
        $c->commenter_id = Auth::user()->id;
        $c->comment_text = $req->comment_text;

        $c->save();
        return redirect()->back();
    }

    public function deleteComment($id){
        $c = Comment::find($id);

        //comment can only be deleted by the commenter
        if($c->commenter_id != Auth::user()->id){
            return redirect()->back();
        }

        $c->delete();

        return redirect()->back();
    }

    public function deleteCommentByAdmin($id){
        $c = Comment::find($id);
        $c->delete();

        return redirect()->back();
    }
}
