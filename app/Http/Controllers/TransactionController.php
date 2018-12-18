<?php

namespace App\Http\Controllers;

use App\Detail_Transaction;
use App\Header_Transaction;
use App\Post_Image;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function viewAll_getPage(){

        $headers = Header_Transaction::getAll();

        foreach($headers as $h){
            $h["detail"] = Detail_Transaction::where('header_id', 'EQUALS', $h->id);// -> paginate(10);
        }

        return view('viewalltransactions', compact('headers'));
    }

    public function addToCart($id, $qty){
        //add a post to cart
        //cookie array... add post there

        //update total price
        $post = Post_Image::find($id)->first();
        $price = $post->price * $qty;
        $old_total = Cookie::get('total_price');
        Cookie::set('total_price', $old_total + $price);

        //update item count
        $old_count = Cookie::get('item_count');
        Cookie::set('item_count', $old_count + 1);

        //returns back
        return redirect()->back();
    }

    public function removeFromCart($id, $qty){
        //remove a post from cart
        //cookie array... find the mentioned item
        $old_qty = null;

        //update total price
        $post = Post_Image::find($id)->first();
        $price = $post->price * $qty;
        $old_total = Cookie::get('total_price');
        Cookie::set('total_price', $old_total - $price);

        //update item count if the qty is same as the one in the cart previously
        if($qty == $old_qty){
            $old_count = Cookie::get('item_count');
            Cookie::set('item_count', $old_count - 1);
        }

        //returns back
        return redirect()->back();
    }

    public function purchase(){
        //purchase everything on cart

        //make new header_transaction
        $h = new Header_Transaction();
        $h->buyer_id = Auth::user()->id;
        $h->total_price = Cookie::get('total_price');

        //foreach item in cart, make detail transaction with same id as $h
        //foreach(){}

        //reset total price to 0
        Cookie::set('total_price', 0);
        //reset item_count to 0
        Cookie::set('item_count', 0);

        //go back to home
        return redirect('/home');
    }

}
