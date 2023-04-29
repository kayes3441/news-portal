<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class TagController extends Controller
{
    public function index(){
        return view('admin.tag.index',
        [
            'categories' => Category::where('parent_id','=','0')->get(),
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'category_id' =>'required',
            'name'        =>'required'
        ]);
        if($validator->fails()){
            return response()->json(['success'=>false,'message'=>$validator->errors()]);
        }
        Tag::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
        ]);

        return redirect()->back()->with('message', 'Tag Create Successfully');

    }
}
