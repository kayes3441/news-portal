<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\CPU\ImageManager;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
class CategoryController extends Controller
{
    public function __construct(
        private  Category $category
    ){

    }

    public function index(Request $request){
        $query_peram = [];
        if($request->has('search')){
            $query_peram = $request->search;
        }
        $categories = $this->category->when($request->has('search'),function($query)use($request){
            return $query->where('name','LIKE','%'.$request->search.'%');
        })->where('position',1)->paginate(15)->appends($query_peram);
        return view('admin.category.index',compact('categories'));
    }
    public function store(Request $request){
       $validator = Validator::make($request->all(),[
           'name'       =>'required',
           'priority'   => 'required',
       ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $image_name = "";
        if($request->has('logo')){
            $image_name = ImageManager::upload('category/','png',$request->file('logo'));
        }
       DB::table('categories')->insert([
           'name'     => $request->name,
           'priority' => $request->priority,
           'logo'     => $image_name,
       ]);

       return redirect()->back()->with('message.success','Category Create Successfully');
    }
    public function show(){

    }

    public function delete(Request $request){
        $this->category->where('id',$request->id)->delete();
        return redirect()->back()->with('message.info','Successfully Deleted');
    }

    public function status_update(Request $request){
        $this->category->where(['id' => $request['id']])->update(['status' => $request['status']]);
        return response()->json([
            'success' => 1,
        ], 200);
    }
}
