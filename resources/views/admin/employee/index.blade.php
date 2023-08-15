@extends('layout.admin.master')
@section('title') Employee  @endsection
@section('doc-title') Employee  @endsection
@section('add-css')

@endsection
@section('body')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body" id="addForm">
                <form  action="{{route('admin.employee.store')}}" method="POST" id="formSubmit"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label>Name</label>
                            <div>
                                <input type="text " name="name" class="form-control" placeholder="Enter Employee Name" >
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Email</label>
                            <div>
                                <input type="email " name="email" class="form-control"placeholder="Enter Employee Email" >
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Password</label>
                            <div>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" onkeyup="passowrd()" required="required" data-validation-required-message="Please enter your email" aria-invalid="false">
                                <span class="passoword mt-1"></span>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Confirm Passowrd</label>
                            <div>
                                <input type="password" class="form-control" placeholder="Confirm Passowrd" id="confirm_password" onkeyup="passowrd_match()" name="confirm_password" required="required" data-validation-required-message="Please enter your email" aria-invalid="false">
                                <span class="match_passoword mt-1"></span>
                            </div>
                        </div>
                        {{-- <div class="row"> --}}
                        <div class="col-xl-12 mb-3">
                            <label>Role</label>
                            <div>
                                <input type="text " name="role" class="form-control" placeholder="Enter" >
                            </div>
                        </div>
                        <label class=" mb-3">Permission</label>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="dashboard" class="module-permission" id="dashboard">
                                <label class="title-color mb-0" style=";" for="dashboard">Dashboard</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="category" id="pos_management">
                                <label class="title-color mb-0" style=";" for="pos_management">Category</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="news_manage" id="pos_management">
                                <label class="title-color mb-0" style=";" for="pos_management">News Management</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="employee_manage" id="pos_management">
                                <label class="title-color mb-0" style=";" for="pos_management">Employee Management</label>
                            </div>
                        </div>
                        {{-- </div> --}}
                        <div class="col-lg-12 d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary w-md mx-2"><i class="fa fa-save"></i> Add Employee </button>
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
                        <h4 class="card-title">Employee ({{$employees->total()}})</h4>
                        <form class="ml-auto" action="{{route('admin.category.index')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{request('search')}}" id="inputGroupFile02">
                                <button type="submit" class="input-group-text" for="inputGroupFile02">Serach</button>
                              </div>
                        </form>
                    </div>
                    @include('admin.employee.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')@include('admin.employee.script')@endsection
