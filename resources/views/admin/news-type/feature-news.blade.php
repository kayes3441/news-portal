@extends('layout.admin.master')
@section('title') Feature News  @endsection
@section('doc-title') Feature News  @endsection
@section('add-css')

@endsection
@section('body')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body" id="addForm">
                <form  action="{{route('admin.news.news-type-store')}}" method="POST" id="formSubmit"  enctype="multipart/form-data" >
                    @csrf
                    <input name="type" value="feature" hidden>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label>News</label>
                                <div>
                                    <select class="form-control" name="news_id" style="border-radius:4px" >
                                        <option value="" selected disabled>--Select News--</option>
                                        @foreach ($all_news as $news)
                                            <option value="{{$news->id}}">{{$news->title}}</option>
                                        @endforeach
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary w-md mx-2"><i class="fa fa-save"></i> Add To Feature News </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Feature News ({{$feature_news->total()}})</h4>
                        <form class="ml-auto" action="{{route('admin.news.feature-news')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{request('search')}}" >
                                <button type="submit" class="input-group-text" for="inputGroupFile02">Serach</button>
                              </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        @include('admin.news-type.table',['news_types'=>$feature_news])
                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        {!!$feature_news->links()!!}
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')@include('admin.news-type.script')@endsection
