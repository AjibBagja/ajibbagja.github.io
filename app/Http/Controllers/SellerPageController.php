<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SellerPageController extends Controller
{
    public function transaksi(){
    	return view('seller/transaction/index');
    }
    public function dashboard(){
    	return view('seller/dashboard');
    }
}
