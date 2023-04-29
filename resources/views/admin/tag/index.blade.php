@extends('layout.admin.master')
@section('title') Tag  @endsection
@section('doc-title') Tag  @endsection
@section('add-css')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
@section('body')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body" id="addForm">
                <h5 class="card-title text-primary mb-3"> Tag </h5>
                <form  action="{{route('admin.tag.create')}}" method="POST" id="formSubmit"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 mb-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 120px"> Category </span>
                                    </div>
                                    <select class="form-control" name="category_id" style="border-radius:4px" required>
                                        <option value="" selected disabled>--Select Category--</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"style="width: 100px">Tag Name</span>
                                    </div>
                                    <input type="text " name="name" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Save</button>
                            {{--                            <button type="reset" class="btn btn-warning"><i class="fa fa-times-circle"></i> Reset</button>--}}
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
                    <h4 class="card-title">Tag Table</h4>
                    {{--                        <h6 class="text-success text-center">{{Session::get('message')}}</h6>--}}
                    @include('admin.tag.table')
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')@include('admin.tag.script')@endsection
