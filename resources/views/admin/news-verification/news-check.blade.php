@extends('layout.admin.master')
@section('title') Add News Form @endsection
@section('add-css')

@endsection
@section('body')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="pt-3">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <div>

                                <h4>Title : {{$news->title}}</h4>

                                <div class="mt-4">
                                    <div class="text-muted font-size-14">
                                        <p>{!! $news->description !!}</p>
                                        <div class="my-5">
                                            <h4 class="card-title">Thumbnail : </h4>
                                            <img src="{{asset('storage/app/public/news')}}/{{$news['thumbnail']}}" alt="" class="img-thumbnail mx-auto d-block w-50">
                                        </div>
                                        <div class="card">
                                            <div class="card-body __WebInspectorHideElement__">
                                                <h4 class="card-title">Images</h4>
                                                <div class="popup-gallery d-flex flex-wrap">
                                                    @foreach (json_decode($news->images) as $key=>$value)
                                                        <div class="img-fluid">
                                                            <img src="{{asset('storage/app/public/news')}}/{{$value}}" alt="" class="img-thumbnail mx-auto d-block w-50">
                                                        </div>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                        {{-- onerror="this.src='{{asset('public/assets/front-end/img/placeholder.png')}}'" --}}
                                        @if ($news->tags)
                                            <div class="mt-4">
                                                <h5 class="mb-3">Tag:

                                                    @foreach ($news->tags as $key=>$value)
                                                    {{$value->tags}}
                                                    @endforeach
                                                </h5>
                                            </div>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="mt-4">
                                        <div class="text-start">
                                            <a href="{{route('admin.news.verify',['id'=>$news->id])}}" class="btn btn-success w-sm">Verify</a>
                                            <a href="{{route('admin.news.pending-news')}}" class="btn btn-info w-sm">Back</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
