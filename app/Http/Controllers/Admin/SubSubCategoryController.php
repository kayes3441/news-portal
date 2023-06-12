<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
class SubSubCategoryController extends Controller
{
    public function index(){
        return view('admin.sub_sub_category.index',
            [
                'categories' => Category::where('parent_id','0')->get()
            ]);
    }
    public function getSubCategory(Request $request){

//        return 'hi';
        $category_id = $request->id;
        $sub_categories = Category::where('parent_id',$category_id)->get();
       // return response()->json(['data'=>$sub_category]);

        $option= ['<option value="" selected disabled>--Select Sub Category--</option>'];
        foreach ($sub_categories  as $value){
            $option[] = '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        return response()->json(['success'=>true,'content'=>$option]);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'priority' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()]);
        }
        $image_name = []
        if($request->has('logo')){
            $image_name = ImageManager::upload('category/','png',$request->file('logo'));
        }
        Category::create([
            'name' => $request->name,
            'parent_id'=>$request->sub_category,
            'priority' => $request->priority,
            'logo' => $image_name,
        ]);

        return redirect()->back()->with('message', 'Sub Category Create Successfully');
    }
}
