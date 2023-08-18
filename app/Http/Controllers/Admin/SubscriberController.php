<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //
    public function subscriber(){
        $subscribers = Subscriber::orderBy('id','desc')->paginate(30);
        return view('admin.subscriber.index',compact('subscribers'));
    }
    public function delete(Request $request){
        Subscriber::where('id',$request->id)->delete();
        return redirect()->back()->with('message.info','Successfully Deleted');
    }
}
