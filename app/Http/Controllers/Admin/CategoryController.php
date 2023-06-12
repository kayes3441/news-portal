<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\CPU\ImageManager;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
class CategoryController extends Controller
{


    public function index(){
        return view('admin.category.index');
    }
    public function create(Request $request){
       $validator = Validator::make($request->all(),[
           'name'       =>'required',
           'priority'   => 'required',
       ]);
        if ($validator->fails()){
            return response()->json(['success'=>false,'message'=>$validator->errors()]);
        }
        $image_name = [];
        if($request->has('logo')){
            $image_name = ImageManager::upload('category/','png',$request->file('logo'));
        }
       Category::create([
           'name'     => $request->name,
           'priority' => $request->priority,
           'logo'     => $image_name,
       ]);
       return redirect()->back()->with('message.success','Category Create Successfully');
    }
}
