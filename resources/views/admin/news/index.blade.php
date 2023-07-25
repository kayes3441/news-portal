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
    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('admin.news.add-news')}}" class="btn btn-primary"> Add News </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Post Table</h4>
                    {{--                        <h6 class="text-success text-center">{{Session::get('message')}}</h6>--}}
                    @include('admin.news.table')
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')@include('admin.news.script')@endsection
