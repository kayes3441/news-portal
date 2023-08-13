<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsType;
use App\Models\SavedNews;
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
        $news = News::with('comment.reply')->where('id',$request->id)->first();
        DB::table('news')->where('id',$news->id)->update(['read_news'=>$news->read_news+1 ]);
        $trending_news = NewsType::with(['news.category'])->where(['type'=>'trending','status'=>1])->inRandomOrder()->take(12)->get();
        $featured_news = $this->news_type->with(['news.category'])->where(['type'=>'feature','status'=>1])->inRandomOrder()->take(12)->get();
        $categories = $this->category->where(['parent_id'=>0,'status'=> 1])->inRandomOrder()->take(12)->get();
        $tags = $this->tag->take('12')->get();
        return view('theme.news.details',compact('news','trending_news','categories','tags','featured_news'));
    }

    public function store_saved_news(Request $request)
    {
        $saved_news = SavedNews::where('user_id', auth('users')->id())->where('news_id', $request->news_id)->first();
        if ($saved_news) {
            $saved_news->delete();
            return response()->json([
                'error' => "Saved News Removed",
                'value' => 2,
            ]);

        } else {
            $saved_news = new SavedNews;
            $saved_news->user_id = auth('users')->id();
            $saved_news->news_id = $request->news_id;
            $saved_news->save();

            return response()->json([
                'success' => "News Saved",
                'value' => 1,
            ]);
        }
    }
    public function comment(Request $request){
        DB::table('comments')->insert([
            'news_id'=>$request->news_id,
            'user_id'=>$request->user_id,
            'comment'=>$request->comment,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return redirect()->back();
    }
    public function reply(Request $request){
        DB::table('comments')->insert([
            'news_id'=>$request->news_id,
            'user_id'=>$request->user_id,
            'comment'=>$request->comment,
            'comment_reply_id'=>$request->comment_id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return redirect()->back();
    }
}
