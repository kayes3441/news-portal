<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Validator;
class BannerController extends Controller
{
    public function index(){
        return view('admin.banner.index');
    }
    public function bannerForm(){
        return view('admin.banner.banner-form');
    }

    public function create(Request $request){
       // return response()->json($request->all());
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'image'=>'required'
        ]);
        if ($validator->fails()){
            return response()->json(['success'=>false,'message'=>$validator->errors()]);
        }


        $image      = $request->file('image');
        $imageName  = $image->getClientOriginalName();
        $directory  ='Banner-Images/';
        $image      ->move($directory,$imageName);

        Banner::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $directory.$imageName,
        ]);

        return response()->json(['success'=>true]);
    }
}
