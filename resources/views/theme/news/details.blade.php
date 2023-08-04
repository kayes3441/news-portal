@extends('theme.layout.app')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="{{route('home')}}">Home</a>
            <span class="breadcrumb-item active">News Details</span>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        <div class="position-relative overflow-hidden" style="height: 435px;">
                            <img src="{{asset('storage/app/public/news')}}/{{$news['thumbnail']}}" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                        </div>
                        @foreach (json_decode($news->images) as $image)
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                <img src="{{asset('storage/app/public/news')}}/{{$image}}" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                    {{-- <img clas  s="img-fluid w-100" src="{{asset('storage/app/public/news')}}/{{$news['thumbnail']}}" style="object-fit: cover;"> --}}
                    <div class="overlay position-relative bg-light">
                        <div class="mb-3">
                            <a href="{{route('all-news',['data_from'=>'category','id'=>$news->category['id']])}}">{{$news->category->name}}</a>
                            <span class="px-1">/</span>
                            <span>{{date('M d, Y',strtotime($news->created_at))}}</span>
                        </div>
                        <div>
                            <h3 class="mb-3">{{$news->title}}</h3>
                            <p> {!! $news->description!!}</p>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

                <!-- Comment List Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">3 Comments</h3>
                    <div class="media mb-4">
                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                consetetur at sit.</p>
                            <button class="btn btn-sm btn-outline-secondary">Reply</button>
                        </div>
                    </div>
                    <div class="media">
                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6><a href="">John Doe</a> <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                consetetur at sit.</p>
                            <button class="btn btn-sm btn-outline-secondary">Reply</button>
                            <div class="media mt-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                    style="width: 45px;">
                                <div class="media-body">
                                    <h6><a href="">John Doe</a> <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                        labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                        eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet
                                        ipsum diam tempor consetetur at sit.</p>
                                    <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">Leave a comment</h3>
                    <form>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website">
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Leave a comment"
                                class="btn btn-primary font-weight-semi-bold py-2 px-3">
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
            </div>

            <div class="col-lg-4 mt-lg-n4">
                <!-- Ads Start -->
                <div class="">
                    <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
                </div>
                <!-- Ads End -->

                <!-- Popular News Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Trending</h3>
                    </div>
                    @foreach ($trending_news as  $trending)
                        <div class="d-flex mb-3">
                            <img src="{{asset('storage/app/public/news')}}/{{$trending->news['thumbnail']}}" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="{{route('all-news',['data_from'=>'category','id'=>$trending->news->category['id']])}}">{{isset($trending->news->category->name) ?$trending->news->category->name :''}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{date('M d, Y',strtotime($trending->news->created_at))}}</span>
                                </div>
                                <a class="h6 m-0" href="{{route('details',['id'=>$trending->news->id])}}">{{$trending->news->title}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Feature</h3>
                    </div>
                    @foreach ($featured_news as $featured)
                        <div class="d-flex mb-3">
                            <img src="{{asset('storage/app/public/news')}}/{{$featured->news['thumbnail']}}" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="{{route('all-news',['data_from'=>'category','id'=>$featured->news->category['id']])}}">{{isset($featured->news->category->name) ?$featured->news->category->name :''}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{date('M d, Y',strtotime($featured->news->created_at))}}</span>
                                </div>
                                <a class="h6 m-0" href="{{route('details',['id'=>$featured->news->id])}}">{{$featured->news->title}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Popular News End -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- News With Sidebar End -->
@endsection
