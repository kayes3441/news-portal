<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsType;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsDetailsController extends Controller
{
    //
    public function __construct(
        private  Category $category,
        private  News $news,
        private  NewsType $news_type,
        private  Tag $tag,

    ){
    }
    public function news_details(Request $request){
        $news = News::find($request->id);
        DB::table('news')->where('id',$news->id)->update(['read_news'=>$news->read_news+1 ]);
        $trending_news = NewsType::with(['news.category'])->where(['type'=>'trending','status'=>1])->inRandomOrder()->take(12)->get();
        $featured_news = $this->news_type->with(['news.category'])->where(['type'=>'feature','status'=>1])->inRandomOrder()->take(12)->get();
        $categories = $this->category->where(['parent_id'=>0,'status'=> 1])->inRandomOrder()->take(12)->get();
        $tags = $this->tag->take('12')->get();
        return view('theme.news.details',compact('news','trending_news','categories','tags','featured_news'));
    }
}
