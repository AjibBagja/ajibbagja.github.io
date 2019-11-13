<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Item;
use App\Cart;
use Auth;
class BuyerController extends Controller
{
    public function detail_item(Request $request,$id){
    	return view('buyer/detail_item')->with('data',Item::find($id));
    }
    public function cart(Request $request){
    	return view('buyer/transaction/cart')->with('data',Cart::where('id_user',Auth::user()->id_user)->with('ritem')->get());
    }
    public function checkout(Request $request){
    	return view('buyer/transaction/checkout')->with('data',Cart::where('id_user',Auth::user()->id_user)->with('ritem')->get());
    }
}
