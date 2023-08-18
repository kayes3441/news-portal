@extends('theme.layout.app')
@section('content')
<!-- Top News Slider Start -->
@include('theme.partials._top-news-slider')
<!-- Top News Slider End -->

<!-- Main News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                    @foreach ($latest_news as $news)
                        <div class="position-relative overflow-hidden" style="height: 435px;">
                            <img src="{{asset('storage/app/public/news')}}/{{$news['thumbnail']}}" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-1 d-flex">
                                    <a href="{{route('all-news',['data_from'=>'category','id'=>$news->category['id']])}}" class="text-white" >{{$news->category->name}}</a>
                                    <span class="px-2 text-white">/</span>
                                    <div class="text-white" >{{date('M d, Y',strtotime($news->created_at))}}</div>
                                </div>
                                <a href="{{route('details',['id'=>$news->id])}}" class="h2 m-0 text-white font-weight-bold">{{$news->title}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Categories</h3>
                </div>
                <div class="category-overflow">
                    @foreach ($categories as $category)
                        <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                            <img class="img-fluid w-100 h-100" src="{{asset('storage/app/public/category')}}/{{$category['logo']}}" style="object-fit: cover;">
                            <a href="{{route('all-news',['data_from'=>'category','id'=>$category['id']])}}" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                                {{$category->name}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->

<!-- Featured News Slider Start -->
@include('theme.partials._featured-news')
<!-- Featured News Slider End -->

<!-- Category News Slider Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            @foreach ($category_wise_news as $category)
                @if (count($category->news) > 0)
                    <div class="col-lg-6 py-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 onclick="location.href='{{route('all-news',['data_from'=>'category','id'=>$category['id']])}}'"  class="m-0">{{$category->name}}</h3>
                        </div>
                        <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                            @foreach ($category->news as $key=>$news)
                                <div class="position-relative">
                                    <img class="img-fluid w-100 h-170" src="{{asset('storage/app/public/news')}}/{{$news['thumbnail']}}" style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 13px;">
                                            <span>{{date('M d, Y',strtotime($news->created_at))}}</span>
                                        </div>
                                        <a href="{{route('details',['id'=>$news->id])}}" class="h4 m-0">{{$news->title}}</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- Category News Slider End -->

<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Latest</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="{{route('all-news',['data_from'=>'latest'])}}">View All</a>
                        </div>
                    </div>
                    @foreach ($latest_news as $news)
                        <div class="col-lg-3">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{asset('storage/app/public/news')}}/{{$news['thumbnail']}}" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="{{route('all-news',['data_from'=>'category','id'=>$news->category['id']])}}">{{$news->category->name}}</a>
                                        <span class="px-1">/</span>
                                        <span>{{date('M d, Y',strtotime($news->created_at))}}</span>
                                    </div>
                                    <a href="{{route('details',['id'=>$news->id])}}" class="h4" >{{$news->title}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Trending</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="{{route('all-news',['data_from'=>'trending'])}}">View All</a>
                        </div>
                    </div>
                    @foreach ($trending_news as $trending)
                        <div class="col-lg-3">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{asset('storage/app/public/news')}}/{{$trending->news['thumbnail']}}" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="{{route('all-news',['data_from'=>'category','id'=>$trending->news->category['id']])}}">{{$trending->news->category->name}}</a>
                                        <span class="px-1">/</span>
                                        <span>{{date('M d, Y',strtotime($trending->news->created_at))}}</span>
                                    </div>
                                    <a href="{{route('details',['id'=>$trending->news->id])}}" class="h4">{{$trending->news->title}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Popular</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none"  href="{{route('all-news',['data_from'=>'popular'])}}">View All</a>
                        </div>
                    </div>
                    @foreach ($populer_news as $news)
                    <div class="col-lg-3">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{asset('storage/app/public/news')}}/{{$news['thumbnail']}}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="{{route('all-news',['data_from'=>'category','id'=>$news->category['id']])}}">{{$news->category->name}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{date('M d, Y',strtotime($news->created_at))}}</span>
                                </div>
                                <a href="{{route('details',['id'=>$news->id])}}" class="h4" >{{$news->title}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach>
                </div>
                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- News With Sidebar End -->
@endsection
