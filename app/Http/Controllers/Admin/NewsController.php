<?php

namespace App\Http\Controllers\Admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
Use Validator;
class NewsController extends Controller
{
    public function __construct(
        private  Category $category,
        private  Tag $tag,
    ){

    }
    public function index(){
        return view('admin.news.index');
    }
    public function add_news(){
        $categories =  $this->category->where(['parent_id'=>0,'status'=>1])->get();
        return view('admin.news.add-news',compact('categories'));
    }
    public function sotre(Request $request){
        // return $request->all();
        $user = auth('admins')->user()->name;
        //return $user;
        $validator = Validator::make($request->all(),[
            'title'       =>'required',
            'category_id'   => 'required',
            'description'   => 'required',
            'thumbnail'   => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
         $thumbnail = "";
         if($request->has('thumbnail')){
             $thumbnail = ImageManager::upload('news/','png',$request->file('thumbnail'));
         }
         $images = [];
        foreach ($request->file('images') as $img) {
            $images[] = ImageManager::upload('news/','png',$img);
        }


        $news_id = DB::table('news')->insertGetId([
            'title'         => $request->title,
            'category_id'   => $request->category_id,
            'description'   => $request->description,
            'video'     => $request->video_url,
            'thumbnail'     => $thumbnail,
            'images'        => json_encode($images),
            'news_cover_by' => $user,
        ]);
        $tags =[];
        foreach(json_decode($request->tags) as $key=>$value){
            $tags[$key] = $value->value;
        }
        foreach($tags as $tag){
            DB::table('tags')->insert([
                'news_id' => $news_id,
                'tags' => $tag,
            ]);
        }
        return redirect()->back()->with('message.success','News Add Successfully');
     }
}
