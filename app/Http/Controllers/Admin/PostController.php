<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    public function index(){
        return view('admin.post.index');
    }


    public function store(Request $request){
        //return $request->all();
        $validator = Validator::make($request->all(),[
            'name'                => 'required',
            'description'         => 'required',
            'category_id'         => 'required',
            'sub_category_id'     => 'required',
            'sub_sub_category_id' => 'required',
            //'tags'                => 'required',
        ]);
        if ($validator->fails()){
            return response()->json(['success'=>false,'message'=>$validator->errors()]);
        }

        $main_image            = $request->file('main_image');
        $main_image_name       = $main_image->getClientOriginalName();
        $main_image_directory  = 'Post-Images/';
        $main_image            -> move($main_image_directory,$main_image_name);

        $tags = [];
        foreach ($request->tag as $key=> $value){
            $tags[] = $value;
        }
        $tag = implode(',',$tags);
        $post = Post::create([
           'name'                => $request->name,
           'description'         => $request->description,
           'category_id'         => $request->category_id,
           'sub_category_id'     => $request->sub_category_id,
           'sub_sub_category_id' => $request->sub_sub_category_id,
           'tags'                => $tag,
           'video'               => $request->video,
           'image'               => $main_image_directory.$main_image_name,
        ]);

        foreach ($request->file('image') as $media_image){
            $media_imageName          = $media_image->getClientOriginalName();
            $media_directory          = 'Media-Image/';
            $media_image              -> move($media_directory,$media_imageName);

            $media                    = new Media();
            $media->post_id           = $post->id;
            $media->image       = $media_directory.$media_imageName;
            $media->save();
        }
        return redirect('admin/post/index')->with(['message'=>'Post Create Successfully']);
    }
}
