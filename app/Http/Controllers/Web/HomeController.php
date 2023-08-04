<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsType;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private  Category $category,
        private  News $news,
        private  NewsType $news_type,
        private  Tag $tag,

    ){

    }
    public function home(){
        $trending_news = $this->news_type->with('news')->where(['type'=>'trending','status'=>1])->take(12)->get();
        $featured_news = $this->news_type->with(['news.category'])->where(['type'=>'feature','status'=>1])->take(12)->get();
        $random_news = $this->news->where('status', 1)->inRandomOrder()->take(9)->get();
        $latest_news = $this->news->where('status', 1)->latest()->take(12)->get();
        $categories = $this->category->where(['parent_id'=>0,'status'=> 1])->inRandomOrder()->take(12)->get();
        $populer_news = $this->news->where('read_news','!=',null)->orderBy('read_news','desc')->take(12)->get();
        $category_wise_news = $this->category->with(['news'=>function($query){
                                $query->where('status',1)->take(9)->get();
                            }])
                            ->where(['parent_id'=>0,'status'=> 1])->get();
        $tags = $this->tag->take('12')->get();
        return view('theme.home',compact('trending_news','random_news','featured_news','latest_news','categories'
                                           ,'category_wise_news','tags','populer_news' ));
    }
}
