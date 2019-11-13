<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Item;
use Auth;
class ItemController extends Controller
{
    public function index(){
    	return view('seller/items/index')->with("data",Item::where('id_user',Auth::user()->id_user)->get());
    }
    public function refreshContent(Request $request){
    	if($request->ajax()){	
	    	return view('seller/items/content')->render();
    	}
    }
    public function add(Request $request){
	   	if(Item::create(array_add($request->all(),"id_user",Auth::user()->id_user))){
            return redirect('seller/items')->with('success',"Data berhasil diinputkan");
	   	}
	   	else{
            return redirect('seller/items')->with('error',"Data gagal diinputkan");
        }
    }
    public function addPage(){
        return view('seller/items/add');
    }
    public function delete($id,Request $request){
	    if(Item::find($id)->delete()){
	   		return redirect('seller/items')->with('success','Data Berhasil Dihapus!');
	   	}
	   	else{
            return redirect('seller/items')->with('success','Data Gagal Dihapus');
	   	}
    }
    public function detail($id,Request $request){
    	if($request->ajax()){
    		$view = view("seller/items/detail")->with("data",Item::where('id_item',$id)->with('ruser')->first()->toArray())->render();
    		return $view;
    	}
        else{
            abort(404);
        }
    }
    public function edit($id,Request $request){
    	return view("seller/items/edit")->with("data",Item::find($id))->render();
    }
    public function update(Request $request,$id){
	    if(Item::find($id)->update(array_except($request->input(),['_token','id_item']))){
	   		return redirect('seller/items')->with("success","Data Berhasil diubah!");
	   	}
	   	else{
	   		return redirect('seller/items')->with("error","Data Gagal diubah!");
	   	}
    }
}
