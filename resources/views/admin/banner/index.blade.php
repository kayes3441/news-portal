@extends('layout.admin.master')
@section('title') Banner  @endsection
@section('doc-title') Banner  @endsection
@section('add-css')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="col-xl-10">
                    <a href="{{route('admin.banner.banner-form')}}" class="btn btn-primary"> Create Banner </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banner Table</h4>
{{--                        <h6 class="text-success text-center">{{Session::get('message')}}</h6>--}}
                       @include('admin.banner.table')
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('js')@include('admin.banner.script')@endsection
