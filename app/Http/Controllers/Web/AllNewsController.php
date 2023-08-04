<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsType;
use App\Models\Tag;
use Illuminate\Http\Request;

class AllNewsController extends Controller
{
    public function __construct(
        private  Category $category,
        private  News $news,
        private  NewsType $news_type,
        private  Tag $tag,

    ){
    }
    public function all_news(Request $request){
        $trending_news = NewsType::with(['news.category'])->where(['type'=>'trending','status'=>1])->inRandomOrder()->take(12)->get();
        $categories = $this->category->where(['parent_id'=>0,'status'=> 1])->inRandomOrder()->take(12)->get();
        $tags = $this->tag->take('12')->get();
        $all_news = $this->news->with(['Category', 'news_type'])
            ->when($request->has('data_from') && $request->data_from == 'category', function ($query) use ($request) {
                return $query->whereHas('Category', function ($sub_query) use ($request) {
                    $sub_query->where('id', $request->id);
                });
            })
            ->when($request->has('data_from') && $request->data_from == 'latest', function ($query) {
                return $query->orderBy('id', 'desc');
            })
            ->when($request->has('data_from') && $request->data_from == 'popular', function ($query) {
                return $query->where('read_news', '!=', null)->orderBy('read_news', 'desc');
            })
            ->when($request->has('data_from') && ($request->data_from == 'trending' || $request->data_from == 'feature'), function ($query) use ($request) {
                return $query->whereHas('news_type', function ($sub_query) use ($request) {
                    $sub_query->where('type', $request->data_from);
                });
            })
            ->where('status', 1)
            ->paginate(10, ['*'], 'page', $request->page)
            ->appends(['data_from' => $request->data_from]);
       return view('theme.news.all-news',compact('all_news','trending_news','categories','tags'));
    }
}
