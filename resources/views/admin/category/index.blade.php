@extends('layout.admin.master')
@section('title') Category  @endsection
@section('doc-title') Category  @endsection
@section('add-css')

@endsection
@section('body')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body" id="addForm">
                <form  action="{{route('admin.category.store')}}" method="POST" id="formSubmit"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="mb-3">
                                <label>Category Name</label>
                                <div>
                                    <input type="text " name="name" class="form-control" placeholder="" >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Priority</label>
                                <div>
                                    <select class="form-control" name="priority" style="border-radius:4px" >
                                        <option value="" selected disabled>--Select Priority--</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                       <option value="10">10</option>
                                   </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Image</label>
                                <div>
                                    <input type="file" min="0" step="0.01" onchange="readURL(this);" name="logo"  value="" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 text-center mt-lg-5">
                            <img id="catgory_image" src="{{asset('public/admin/assets/images/placeholder-image.png')}}" height="90px" width="300px" alt="your image"  />
                        </div>
                        <div class="col-lg-12 d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary w-md mx-2"><i class="fa fa-save"></i> Add Category </button>
                            <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times-circle"></i> Reset</button>
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
                        <h4 class="card-title">Categories ({{$categories->total()}})</h4>
                        <form class="ml-auto" action="{{route('admin.category.index')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{request('search')}}" id="inputGroupFile02">
                                <button type="submit" class="input-group-text" for="inputGroupFile02">Serach</button>
                              </div>
                        </form>
                    </div>
                    @include('admin.category.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')@include('admin.category.script')@endsection
