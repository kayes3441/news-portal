@extends('layout.admin.master')
@section('title') Banner Form @endsection
@section('doc-title') Banner Form @endsection
@section('add-css')
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
@section('body')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body" id="addForm">
                <h5 class="card-title text-primary mb-3">Banner</h5>
                <form  action="{{route('admin.banner.create')}}" method="POST" id="formSubmit"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"style="width: 120px">Name</span>
                                    </div>
                                    <input type="text " name="name" class="form-control" placeholder="" >
                                </div>
                                <span class="text-danger" id="category_id_error"></span>
                            </div>
                        </div>
                        <div class="col-xl-12 mb-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 120px">Description</span>
                                    </div>
                                    <textarea   name="description"  class="form-control" placeholder="Description" ></textarea>
                                </div>
                                <span class="text-danger" id="description_error"></span>
                            </div>
                        </div>

                        <div class="col-xl-12 mb-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 120px">Image</span>
                                    </div>
                                    <input type="file" min="0" step="0.01" name="image"  value="" class="form-control" placeholder="" >
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
@endsection
@section('js')@include('admin.banner.script')@endsection
