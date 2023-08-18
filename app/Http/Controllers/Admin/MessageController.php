<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(){
        $messages = Message::orderBy('id','desc')->paginate(30);
        return view('admin.message.index',compact('messages'));
    }
    public function delete(Request $request){
        Message::where('id',$request->id)->delete();
        return redirect()->back()->with('message.info','Successfully Deleted');
    }
}
