<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
class SubCategoryController extends Controller
{
    public function index(){
        return view('admin.sub_category.index',
        [
            'categories' => Category::where('parent_id','0')->get()
        ]);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'priority' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()]);
        }


        $image = $request->file('logo');
        $imageName = $image->getClientOriginalName();
        $directory = 'Category-Images/';
        $image->move($directory, $imageName);
        Category::create([
            'name' => $request->name,
            'parent_id'=>$request->category_id,
            'priority' => $request->priority,
            'logo' => $directory . $imageName,
        ]);

        return redirect()->back()->with('message', 'Sub Category Create Successfully');
    }


}
