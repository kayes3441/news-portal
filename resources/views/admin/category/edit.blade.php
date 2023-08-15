@extends('layout.admin.master')
@section('title') Category  @endsection
@section('doc-title') Category  @endsection
@section('add-css')

@endsection
@section('body')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body" id="addForm">
                <form  action="{{route('admin.category.update',['id'=>$category->id])}}" method="POST" id="formSubmit"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="mb-3">
                                <label>Category Name</label>
                                <div>
                                    <input type="text " name="name" value="{{$category->name}}" class="form-control" placeholder="" >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Priority</label>
                                <div>
                                    <select class="form-control" name="priority" style="border-radius:4px" >
                                        <option value="" selected disabled>--Select Priority--</option>
                                        <option value="1" {{$category->priority == 1 ?'selected' :''}}>1</option>
                                        <option value="2"{{$category->priority == 2 ?'selected' :''}}>2</option>
                                        <option value="3"{{$category->priority == 3 ?'selected' :''}}>3</option>
                                        <option value="4"{{$category->priority == 4 ?'selected' :''}}>4</option>
                                        <option value="5"{{$category->priority == 5 ?'selected' :''}}>5</option>
                                        <option value="6"{{$category->priority == 6 ?'selected' :''}}>6</option>
                                        <option value="7"{{$category->priority == 7 ?'selected' :''}}>7</option>
                                        <option value="8"{{$category->priority == 8 ?'selected' :''}}>8</option>
                                        <option value="9"{{$category->priority == 9 ?'selected' :''}}>9</option>
                                        <option value="10" {{$category->priority == 10 ?'selected' :''}}>10</option>
                                   </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Image</label>
                                <div>
                                    <input type="file" min="0" step="0.01" onchange="readURL(this);" value="{{$category->logo}}" name="logo"  value="" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 text-center mt-lg-5">
                            <img id="catgory_image" src="{{asset ( $category->logo !=null ? 'storage/app/public/category/'.$category->logo : 'public/admin/assets/images/placeholder-image.png' )}}" height="90px" width="300px" alt="your image"  />
                        </div>
                        <div class="col-lg-12 d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary w-md mx-2"><i class="fa fa-save"></i> Update Category </button>
                            <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times-circle"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('js')@include('admin.category.script')@endsection
