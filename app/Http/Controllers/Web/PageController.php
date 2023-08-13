<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsType;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
class PageController extends Controller
{
    public function __construct(
        private  Category $category,
        private  NewsType $news_type,
        private  Tag $tag,

    ){
    }
    public function contact_us_page(){
        $trending_news = NewsType::with(['news.category'])->where(['type'=>'trending','status'=>1])->inRandomOrder()->take(12)->get();
        $categories = $this->category->where(['parent_id'=>0,'status'=> 1])->inRandomOrder()->take(12)->get();
        $tags = $this->tag->take('12')->get();
        return view('theme.page.contact-us',compact('trending_news','categories','tags'));
    }
    public function message_store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'       =>'required',
            'email'   => 'required',
            'message'   => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        DB::table('messages')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('message.success','Message Send Successfully');
    }
    public function newslatter(Request $request){
        DB::table('newslatters')->insert([
            'email'=>$request->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('message.success','Send Successfully');

    }
}
