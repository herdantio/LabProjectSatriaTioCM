<?php

namespace App\Http\Controllers;

use App\Detail_Transaction;
use App\Header_Transaction;
use App\Post_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TransactionController extends Controller
{
    public function viewAll_getPage(){

        $headers = Header_Transaction::getAll();

        foreach($headers as $h){
            $h["detail"] = Detail_Transaction::where('header_id', 'EQUALS', $h->id);// -> paginate(10);
        }

        return view('viewalltransactions', compact('headers'));
    }

    public function addToCart($id){
        //add a post to cart
        $cart = Cookie::get('cart');
        //if its already there, dont add and send message back
        if(array_search($id, $cart) != false){//search for $id in $cart
            return view('cart')->with('message', 'Item is already inside cart!');
        }

        //else, add post there
        $post = Post_Image::find($id);
        array_push($cart, $post);
        Cookie::set('cart', $cart);

        //update total price
        $post = Post_Image::find($id)->first();
        $price = $post->price;
        $old_total = Cookie::get('total_price');
        Cookie::set('total_price', $old_total + $price);

        //update item count
        $old_count = Cookie::get('item_count');
        Cookie::set('item_count', $old_count + 1);

        //returns back
        return redirect()->back();
    }

    public function removeFromCart($id){
        //remove a post from cart
        $cart = Cookie::get('cart');
        //if its not there, dont add and send message back
        if(array_search($id, $cart) == false){//search for $id in $cart
            return view('cart')->with('message', 'Item not found inside cart');
        }

        //else delete the item
        $index = array_search($id, $cart);
        unset($cart[$index]);
        $cart2 = array_values($cart);
        Cookie::set('cart', $cart2);

        //update total price
        $post = Post_Image::find($id)->first();
        $price = $post->price;
        $old_total = Cookie::get('total_price');
        Cookie::set('total_price', $old_total - $price);

        //update item count
        $old_count = Cookie::get('item_count');
        Cookie::set('item_count', $old_count - 1);

        //returns back
        return redirect()->back();
    }

    public function purchase(){
        //purchase everything on cart

        //make new header_transaction
        $h = new Header_Transaction();
        $h->buyer_id = Auth::user()->id;
        $h->total_price = Cookie::get('total_price');
        $h->save();

        //foreach item in cart, make detail transaction with same id as $h
        $last_header = DB::table('header_transactions')->orderBy('id', 'desc')->first();
        $last_header_id = $last_header->id;
        $cart = Cookie::get('cart');
        foreach($cart as $c){
            $detail = new Detail_Transaction();
            $detail->header_id = $last_header_id;
            $detail->post_id = $c->id;
            $detail->save();
        }

        //reset total price to 0
        Cookie::set('total_price', 0);
        //reset item_count to 0
        Cookie::set('item_count', 0);
        //reset cart
        Cookie::set('cart', array());

        //go back to home
        return redirect('/home');
    }

}
