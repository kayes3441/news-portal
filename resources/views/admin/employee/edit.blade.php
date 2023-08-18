@extends('layout.admin.master')
@section('title') Employee  @endsection
@section('doc-title') Employee  @endsection
@section('add-css')

@endsection
@section('body')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body" id="addForm">
                <form  action="{{route('admin.employee.update',['id'=>$employee->id])}}" method="POST"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label>Name</label>
                            <div>
                                <input type="text " name="name" class="form-control" value="{{$employee->name}}" placeholder="Enter Employee Name" >
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Email</label>
                            <div>
                                <input type="email" name="email" value="{{$employee->email}}" class="form-control"placeholder="Enter Employee Email" >
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Password</label>
                            <div>
                                <input type="password" class="form-control" id="password1"  placeholder="Password" name="password" onkeyup="password_check()" required="required" data-validation-required-message="Please enter your email" aria-invalid="false">
                                <span class="password1 mt-1"></span>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Confirm Passowrd</label>
                            <div>
                                <input type="password" class="form-control" id="confirm_passowrd11" placeholder="Confirm Passowrd"  onkeyup="password_match11()" name="confirm_password" required="required" data-validation-required-message="Please enter your email" aria-invalid="false">
                                <span class="match_password1 mt-1"></span>
                            </div>
                        </div>
                        {{-- <div class="row"> --}}

                        <div class="col-xl-12 mb-3">
                            <label>Role</label>
                            <div>
                                <input type="text " name="role" value="{{isset($employee->role) ? $employee->role->name : 'name not found'}}" class="form-control" placeholder="Enter" >
                            </div>
                        </div>
                        <label class=" mb-3">Permission</label>
                        @php($module = json_decode($employee->role->module_access))
                        {{-- @dd($module); --}}
                        {{-- @dd(in_array($module, ['category'])); --}}
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="category" id="pos_management" {{ in_array("category", $module) ? 'checked' : '' }}>
                                <label class="title-color mb-0" style=";" for="pos_management">Category</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="news_manage" {{ in_array("news_manage", $module) ? 'checked' : '' }}  id="pos_management">
                                <label class="title-color mb-0" style=";" for="pos_management">News Management</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="employee_manage" {{ in_array("employee_manage", $module) ? 'checked' : '' }} id="pos_management">
                                <label class="title-color mb-0" style=";" for="pos_management">Employee Management</label>
                            </div>
                        </div>
                        {{-- </div> --}}
                        <div class="col-lg-12 d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary w-md mx-2"><i class="fa fa-save"></i> Update Employee </button>
                            <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times-circle"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    function password_check(){
        let length_password = document.getElementById('password1').value.length;
        if(length_password<8){
            $('.password1').addClass('text-danger')
            $('.password1').empty().html('Password Must 7 + Character');
        }
        else{
            $('.password1').addClass('d-none');
        }
    }
    function password_match11(){
        let password = document.getElementById('password1').value;
        let confirm_password = document.getElementById('confirm_passowrd11').value;
        if(confirm_password.length == null){
            $('.match_password1').addClass('d-none')
        }else{
            $('.match_password1').removeClass('d-none')
        }
        if(password == confirm_password){
            $('.match_password1').addClass('text-success')
            $('.match_password1').removeClass('text-danger')
            $('.match_password1').empty().html('Password Match');
        }else{
            $('.match_password1').removeClass('text-success')
            $('.match_password1').addClass('text-danger')
            $('.match_password1').empty().html('Password Not Match');
        }
    }
</script>

@endsection
