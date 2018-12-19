<?php

namespace App\Http\Controllers;

use App\Followed_Category;
use Illuminate\Http\Request;

class Followed_Category_Controller extends Controller
{
    public function followCategories(Request $req){
        //follows and unfollows all categories set after [save changes] button is pressed in followedcategories view
        $user_id = Auth::user()->id;

        $fcs = Category::where ('user_id', '=', $user_id);

        foreach ($fcs as $f) {
            $f->delete(); //refresh
        }

        $fcs = User::all()->followed_categories();

        return redirect()->back();
    }

    public function followedCategories_getPage(){
        $user_id = Auth::user()->id;
        $fcs = Followed_Category::where('user_id', '=', $user_id);

        return view('followedcategories', compact('fcs'));
    }
}
