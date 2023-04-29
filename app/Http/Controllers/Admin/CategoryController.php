<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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


        $image      = $request->file('logo');
        $imageName  = $image->getClientOriginalName();
        $directory  = 'Category-Images/';
        $image      -> move($directory,$imageName);
       Category::create([
           'name'     => $request->name,
           'priority' => $request->priority,
           'logo'     => $directory.$imageName,
       ]);

       return redirect()->back()->with('message','Category Create Successfully');
    }
}
