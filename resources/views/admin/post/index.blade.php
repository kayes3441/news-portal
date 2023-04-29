@extends('layout.admin.master')
@section('title') Post  @endsection
@section('doc-title') Post  @endsection
@section('add-css')

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="col-xl-10">
                    <a href="{{route('admin.post.post-form')}}" class="btn btn-primary"> Create Post </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Post Table</h4>
                    {{--                        <h6 class="text-success text-center">{{Session::get('message')}}</h6>--}}
                    @include('admin.post.table')
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')@include('admin.post.script')@endsection
