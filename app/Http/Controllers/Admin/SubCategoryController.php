<?php

namespace App\Http\Controllers\Admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
class SubCategoryController extends Controller
{
    public function __construct(
        private  Category $category,
    ){

    }
    public function index(Request $request){

        $query_peram = [];
        if($request->has('search')){
            $query_peram = $request->search;
        }
        $categories = $this->category->where('parent_id','0')->get();
        $sub_categories = $this->category->with('parent')->when($request->has('search'),function($query)use($request){
            return $query->where('name','LIKE','%'.$request->search.'%');
        })->where('position',1)->paginate(15)->appends($query_peram);

        return view('admin.sub-category.index',compact('categories','sub_categories'));
    }
    public function sotre(Request $request){
        $validator = Validator::make($request->all(),[
            'name'       =>'required',
            'priority'   => 'required',
            'category_id'   => 'required',
        ]);
         if ($validator->fails()){
             return back()->withErrors($validator)->withInput();
         }
         $image_name = "";
         if($request->has('logo')){
             $image_name = ImageManager::upload('sub-category/','png',$request->file('logo'));
         }
         DB::table('categories')->insert([
            'name'      => $request->name,
            'parent_id' => $request->category_id,
            'priority'  => $request->priority,
            'logo'      => $image_name,
            'position'  => 1,
        ]);

        return redirect()->back()->with('message.success','Sub Category Create Successfully');
     }



}
