<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsType;
use App\Models\SavedNews;
use App\Models\Tag;
use Illuminate\Http\Request;

class UserProfilController extends Controller
{
    public function __construct(
        private  Category $category,
        private  NewsType $news_type,
        private  Tag $tag,
        private  News $news,
        private  SavedNews $saved_news,

    ){
    }
    public function saved_news_list(){
        $trending_news = NewsType::with(['news.category'])->where(['type'=>'trending','status'=>1])->inRandomOrder()->take(12)->get();
        $categories = $this->category->where(['parent_id'=>0,'status'=> 1])->inRandomOrder()->take(12)->get();
        $tags = $this->tag->take('12')->get();
        $saved_news = $this->saved_news->with('news')->where('user_id',auth('users')->id())->orderBy('id','desc')->paginate(20);
        return view('theme.profile.saved-news',compact('trending_news','categories','tags','saved_news'));
    }
    public function delete_saved_news(Request $request){
        $this->saved_news->find($request->id)->delete();
        return redirect()->back()->with('message.wranning','Removed Successfully');
    }
}
