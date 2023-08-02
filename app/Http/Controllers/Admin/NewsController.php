<?php

namespace App\Http\Controllers\Admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsType;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
Use Validator;
class NewsController extends Controller
{
    public function __construct(
        private  Category $category,
        private  News $news,
        private  NewsType $news_type,
        private  Tag $tag,

    ){

    }
    public function index(Request $request){
        $query_peram = [];
        if($request->has('search')){
            $query_peram = $request->search;
        }
        $all_news = $this->news->when($request->has('search'),function($query)use($request){
            return $query->where('title','LIKE','%'.$request->search.'%');
        })->where('news_cover_by',auth('admins')->user()->name)->paginate(15)->appends($query_peram);
        return view('admin.news.index',compact('all_news'));
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
        if($request->has('images')){
            foreach ($request->file('images') as $img) {
                $images[] = ImageManager::upload('news/','png',$img);
            }
        }

        $news_id = DB::table('news')->insertGetId([
            'title'         => $request->title,
            'category_id'   => $request->category_id,
            'description'   => $request->description,
            'video'         => $request->video_url,
            'thumbnail'     => $thumbnail,
            'images'        => json_encode($images),
            'news_cover_by' => $user,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $tags =[];
        if($request->has('tags')){
            foreach(json_decode($request->tags) as $key=>$value){
                $tags[$key] = $value->value;
            }
            foreach($tags as $tag){
                DB::table('tags')->insert([
                    'news_id' => $news_id,
                    'tags' => $tag,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return redirect()->back()->with('message.success','News Add Successfully');
    }

    public function news_type_store(Request $request){
        $validator = Validator::make($request->all(),[
            'news_id'       =>'required',
        ]);
        if ($validator->fails()){

            return back()->withErrors($validator)->withInput();
        }
        $exist = $this->news_type->where(['type' => $request->type,'news_id'=>$request->news_id])->first();

        if($exist){
            return redirect()->back()->with('message.wranning','Already Added');
        }
        DB::table('news_types')->insertGetId([
            'type' => $request->type,
            'news_id'=>$request->news_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->back()->with('message.success','Added Successfully');
    }
    public function trending_news(Request $request){
        $query_peram = [];
        if($request->has('search')){
            $query_peram = $request->search;
        }
        $trending_news = $this->news_type->with('news')->when($request->has('search'), function($query) use ($request) {
            $query->whereHas('news', function($sub_query) use ($request) {
                return $sub_query->where('title', 'LIKE', '%' . $request->search . '%');
            });
        })->where('type','trending')->latest()->paginate(15)->appends($query_peram);
        $all_news = $this->news->where('status',1)->latest()->get();
        return view ('admin.news-type.trending-news',compact('all_news','trending_news'));
    }

    public function feature_news(Request $request){
        $query_peram = [];
        if($request->has('search')){
            $query_peram = $request->search;
        }
        $feature_news = $this->news_type->with('news')->when($request->has('search'), function($query) use ($request) {
            $query->whereHas('news', function($sub_query) use ($request) {
                return $sub_query->where('title', 'LIKE', '%' . $request->search . '%');
            });
        })->where('type', 'feature')->latest()->paginate(15)->appends($query_peram);
        $all_news = $this->news->where('status',1)->latest()->get();
        return view ('admin.news-type.feature-news',compact('all_news','feature_news'));
    }

    public function news_type_status_update(Request $request){
        $this->news_type->where(['id' => $request['id']])->update(['status' => $request['status']]);
        return response()->json([
            'success' => 1,
        ], 200);
    }
    public function news_type_delete(Request $request){
        $this->news_type->where(['id' => $request['id']])->delete();
        return redirect()->back()->with('message.info','Successfully Deleted');
    }


    public function pending_news(Request $request){
        $query_peram = [];
        if($request->has('search')){
            $query_peram = $request->search;
        }
        $pending_news = $this->news->when($request->has('search'),function($query)use($request){
            return $query->where('title','LIKE','%'.$request->search.'%');
        })->where('status',0)->latest()->paginate(15)->appends($query_peram);
        return view ('admin.news-verification.pending-news',compact('pending_news'));
    }
    public function pending_news_check(Request $request){
        $news = $this->news->with('tags')->where('id',$request->id)->first();
        return view('admin.news-verification.news-check',compact('news'));
    }
    public function verify(Request $request){
        $this->news->where('id',$request->id)->update(['status'=>1]);
        return redirect('admin/news/pending-news');
    }
    public function delete(Request $request){
        $this->news->where('id',$request->id)->delete();
        $this->news_type->where(['news_id' => $request['id']])->delete();
        return redirect('admin/news/pending-news')->with('message.info','Successfully Deleted');
    }
    public function verified_news(Request $request){
        $query_peram = [];
        if($request->has('search')){
            $query_peram = $request->search;
        }
        $verified_news = $this->news->when($request->has('search'),function($query)use($request){
            return $query->where('title','LIKE','%'.$request->search.'%');
        })->where('status',1)->latest()->paginate(15)->appends($query_peram);
        return view ('admin.news-verification.verified-news',compact('verified_news'));
    }
}
