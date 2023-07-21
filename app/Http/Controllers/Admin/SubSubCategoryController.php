<?php

namespace App\Http\Controllers\Admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
class SubSubCategoryController extends Controller
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
        $sub_sub_categories = $this->category->with('parent')->when($request->has('search'),function($query)use($request){
            return $query->where('name','LIKE','%'.$request->search.'%');
        })->where('position',2)->paginate(15)->appends($query_peram);

        return view('admin.sub-sub-category.index',compact('categories','sub_sub_categories'));
    }
    public function get_sub_category(Request $request){

//        return 'hi';
        $category_id = $request->id;
        $sub_categories = $this->category->where('parent_id',$category_id)->get();
        $option= ['<option value="" selected disabled>--Select Sub Category--</option>'];
        foreach ($sub_categories  as $value){
            $option[] = '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        return response()->json(['success'=>true,'content'=>$option]);
    }
    public function sotre(Request $request){
        $validator = Validator::make($request->all(),[
            'name'       =>'required',
            'priority'   => 'required',
            'sub_category_id'   => 'required',
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
            'position'  => 2,
        ]);

        return redirect()->back()->with('message.success','Sub Sub Category Create Successfully');
     }

}
