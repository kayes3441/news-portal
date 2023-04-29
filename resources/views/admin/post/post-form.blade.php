@extends('layout.admin.master')
@section('title') Post Form @endsection
@section('doc-title') Post Form @endsection
@section('add-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endsection
@section('body')
    <div class="col-xl-12">
        <form action="{{route('admin.post.create')}}" method="post" enctype="multipart/form-data">
            @csrf
        {{-- Basic info--}}
        <div class="card">
            <div class="card-body" id="addForm">
                <h5 class="card-title text-primary mb-3">Basic Info </h5>
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
                                    <span class="input-group-text" style="width: 120px;">Description</span>
                                </div>
                            </div>
                            <textarea name="description"  class="form-control summernote" id="summernote" placeholder="Description" ></textarea>
                            <span class="text-danger" id="description_error"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Categories --}}
        <div class="card">
            <div class="card-body" id="addForm">
                <h5 class="card-title text-primary mb-3"> Info </h5>
                <div class="row">
                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">  Category </span>
                                </div>
                                <select class="form-control" name="category_id" id="category_id" style="border-radius:4px" required onchange="getSubCategory(this.value)">
                                    <option value="" selected disabled>--Select Sub Category--</option>
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
                                    <span class="input-group-text" style="width: 120px"> Sub Category </span>
                                </div>
                                <select class="form-control" name="sub_category_id" id="subCategoryId" style="border-radius:4px" onchange="getSubSubCategory(this.value)" required>
                                    <option value="" selected disabled>--Select Sub Category--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px"> Sub Sub Category </span>
                                </div>
                                <select class="form-control" name="sub_sub_category_id" id="sub_sub_category" style="border-radius:4px"  required>
                                    <option value="" selected disabled>--Select Sub Sub Category--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" style="min-width: 50px;background-color: #bfcdea" placeholder="Tags" readonly>
                                <select class="js-example-basic-multiple form-control" multiple="multiple" name="tag[]" id="tag_id"  style="border-radius:4px"  required>
                                    <option value=""  disabled>--Select Tags--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Media--}}
        <div class="card">
            <div class="card-body" id="addForm">
                <h5 class="card-title text-primary mb-3"> Media </h5>
                <div class="row">
                    <div class="col-xl-12 mb-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Main Image </span>
                                </div>
                                <input type="file" class="form-control"  name="main_image" >
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 mb-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">  Images </span>
                                </div>
                                <input type="file" class="form-control" multiple name="image[]" >
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 mb-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">  Video </span>
                                </div>
                                <input type="text" class="form-control "  name="video" placeholder="Video ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-lg-12 text-right">
                <a href="{{route('admin.post.index')}}" class="btn btn-warning mr-2"><i class="fa fa-save"></i> Back</a>
                <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
        </form>
    </div>
@endsection
@section('js')@include('admin.post.script')@endsection
