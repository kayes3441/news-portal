@extends('layout.admin.master')
@section('title') News  @endsection

@section('add-css')

@endsection
@section('doc-title')
<div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">News</h4>
    </div>
</div>
@endsection
@section('body')
    <div class="d-flex justify-content-start mb-3">
        <a href="{{route('admin.news.add-news')}}" class="btn btn-primary"> Add News </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">News ({{$all_news->total()}})</h4>
                        <form class="ml-auto" action="{{route('admin.news.index')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{request('search')}}" id="inputGroupFile02">
                                <button type="submit" class="input-group-text" for="inputGroupFile02">Serach</button>
                              </div>
                        </form>
                    </div>

                    @include('admin.news.table')
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-center">
                {!!$all_news->links()!!}
           </div>
        </div>
    </div>

@endsection

@section('js')@include('admin.news.script')@endsection
