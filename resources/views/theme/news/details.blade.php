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
                        <div class="d-flex mb-3">
                            <div class="mt-1">
                                <a href="{{route('all-news',['data_from'=>'category','id'=>$news->category['id']])}}">{{$news->category->name}}</a>
                                <span class="px-1">/</span>
                                <span>{{date('M d, Y',strtotime($news->created_at))}}</span>

                            </div>
                            @if(auth('users')->check())
                            @php($saved_news = App\Models\SavedNews::where(['news_id'=>$news->id,'user_id'=>auth('users')->id()])->first())
                                <div class="mx-2">
                                    <button class="btn btn-sm saved_news {{isset($saved_news)?'btn-warning':'' }}" onclick="addSavedNews('{{$news->id}}')">
                                        <i class="bx bx-label"></i>
                                        Save
                                    </button>
                                </div>
                            @else
                                <div class="mx-2">
                                    <button class="btn btn-sm saved_news" data-bs-target="#log_in"  data-bs-toggle="modal">
                                        <i class="bx bx-label"></i>
                                        Save
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="mb-3">{{$news->title}}</h3>
                            <p> {!! $news->description!!}</p>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

                {{-- @dd($news->comment); --}}
                <!-- Comment List Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">{{$news->comment->count()}} Comments</h3>
                    @foreach ($news->comment as $comment)
                    <div class="media mb-4">
                        <div class="media-body">
                            <h6>{{$comment->user->f_name}}&nbsp{{$comment->user->l_name}}<small><i>&nbsp{{date('M d, Y',strtotime($comment->created_at))}}</i></small></h6>
                            <p>{{$comment->comment}}</p>
                            <form action="{{route('reply')}}" method="POST">
                                @csrf
                                <input type="text" name="user_id" value="{{auth('users')->id()}}" hidden>
                                <input type="text" name="news_id" value="{{$news->id}}" hidden>
                                <input type="text" name="comment_id" value="{{$comment->id}}" hidden>
                                <textarea cols="30" rows="2" name="comment" class="form-control"></textarea>
                                <button type="submit" class="btn btn-sm btn-outline-secondary mt-1">Reply</button>
                            </form>
                            @if($comment->reply->count() >0)
                            @foreach ($comment->reply as $reply)
                                <div class="media mt-2 mx-5">

                                    <div class="media-body">
                                        <h6>{{$reply->user->f_name}}&nbsp{{$reply->user->l_name}} <small><i>&nbsp{{date('M d, Y',strtotime($reply->created_at))}}</i></small></h6>
                                        <p>{{$reply->comment}}</p>
                                    </div>
                                </div>
                            @endforeach
                            @endif


                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">Leave a comment</h3>
                    <form action="{{route('comment')}}" method="POST">
                        @csrf
                        <input type="text" name="user_id" value="{{auth('users')->id()}}" hidden>
                        <input type="text" name="news_id" value="{{$news->id}}" hidden>
                        <div class="form-group">
                            <label for="message">Comment *</label>
                            <textarea cols="30" rows="5" name="comment" class="form-control"></textarea>
                        </div>
                        @if (auth('users')->check())
                            <div class="form-group mb-0">
                                <button type="submit"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                    Leave a comment
                                </button>
                            </div>
                        @else
                            <div class="form-group mb-0">
                                <a href="javascript:" data-bs-target="#log_in" data-bs-toggle="modal"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                    Leave a comment
                                </a>
                            </div>
                        @endif

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
@push('script')
<script>
    function addSavedNews(news_id) {
        // alert(news_id);
        $.get("{{route('saved-news')}}",{news_id:news_id},(response)=>{
            if (response.value == 1) {
                $(`.saved_news`).addClass('btn-warning');
                Command: toastr["success"](response.success);
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            }else {
                $(`.saved_news`).removeClass('btn-warning');
                Command: toastr["success"](response.error);
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            }
        })
        // $.get({url: '{{route('saved-news')}}',
        //     news_id:news_id
        //     success:function (response){

        //     }
        // });
    }
</script>

@endpush
