<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsType;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $trending_news = NewsType::with('news')->where(['type'=>'trending','status'=>1])->count();
        $featured_news = NewsType::with(['news.category'])->where(['type'=>'feature','status'=>1])->count();
        $news_count = News::where('status',1)->count();
        return view('admin.dashboard.index',compact('trending_news','featured_news','news_count'));
    }
}
