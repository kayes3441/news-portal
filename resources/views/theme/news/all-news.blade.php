@extends('theme.layout.app')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="{{route('home')}}">Home</a>
            <span class="breadcrumb-item ">{{request('data_from')}}</span>
            @if(request('data_from')=='category')
                @php($category = App\Models\Category::where('id',request('id'))->first('name'))
                <span class="breadcrumb-item">{{$category->name}}</span>
            @endif
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            @if(request('data_from') == 'category')
                                @php($category = App\Models\Category::where('id',request('id'))->first('name'))
                                <h3 class="m-0">{{$category->name}}</h3>
                            @else
                                <h3 class="m-0">{{request('data_from')}}</h3>
                            @endif
                        </div>
                    </div>
                    @foreach ($all_news as $news)
                        <div class="col-lg-4">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{asset('storage/app/public/news')}}/{{$news['thumbnail']}}" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="{{route('all-news',['data_from'=>'category','id'=>$news->category['id']])}}">{{isset($news->category->name) ? $news->category->name :''}}</a>
                                        <span class="px-1">/</span>
                                        <span>{{date('M d, Y',strtotime($news->created_at))}}</span>
                                    </div>
                                    <a class="h4" href="{{route('details',['id'=>$news->id])}}">{{$news->title}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                </div>
                <div class="row">
                   {!!$all_news->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
