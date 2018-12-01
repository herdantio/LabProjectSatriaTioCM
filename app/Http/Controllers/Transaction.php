<?php

namespace App\Http\Controllers;

use App\Detail_Transaction;
use App\Header_Transaction;
use Illuminate\Http\Request;

class Transaction extends Controller
{
    public function viewAll_getPage(){

        $headers = Header_Transaction::getAll();

        foreach($headers as $h){
            $h["detail"] = Detail_Transaction::where('header_id', 'EQUALS', $h->id);// -> paginate(10);
        }

        return view('viewalltransactions', compact('headers'));
    }
}
