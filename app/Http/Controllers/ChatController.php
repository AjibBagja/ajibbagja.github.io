<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chat;
use Auth;
class ChatController extends Controller
{
    public function index(){
        return view('general/chatting/index');
    }
    public function getConversation($id){
        Chat::conversation(Chat::conversations()->getById($id))->setUser(Auth::user())->readAll();
        return view('general/chatting/chats')->with('conv_id',$id);

    }
    public function sendChat(Request $request){
    	$message = Chat::message($request->get('msg'))
            ->from(Auth::user())
            ->to(Chat::conversations()->getById($request->get('conv_id')))
            ->send();
        return back();
    }
}
