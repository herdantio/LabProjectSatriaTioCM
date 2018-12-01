<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function showComments($post_id){
        //$comments = Comment::find($post_id);       //$comments = Comment::where('post_id', '=', $post_id) -> paginate(10);
        $comments = Comment::where('post_id', 'EQUALS', $post_id) -> paginate(10);
        return view('postdetail', compact('comments'));
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
