<div class="table-responsive">
    <table class="table" >
        <thead class="table-info">
        <tr class="text-center">
            <th>Sl</th>
            <th>Name</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($employees as $key=>$employee)
            {{-- @dd($employee->admin_role); --}}
                <tr class="table-light text-center ">
                    <td>{{$employees->firstItem()+$key}}</td>
                    <td>{{$employee['name']}}</td>
                    <td>{{isset($employee->role) ? $employee->role->name : 'Role Not Found'}}</td>
                    {{-- <td>
                        <div class="form-check form-switch d-flex justify-content-center">
                            <input class="form-check-input change_status" type="checkbox" id="{{$employee->id}}" {{$employee['status'] == 1 ? 'checked' : ''}}>
                        </div>
                    </td> --}}
                    <td >
                        <ul class="list-unstyled hstack gap-1 mb-0 justify-content-center">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                            </li>
                            <li data-bs-toggle="tooltip"  aria-label="Delete">
                                <a href="javascript:void(0)" onclick="route_alert('{{route('admin.employee.delete',['id'=>$employee->id]) }}','Employee will be deleted')" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

 <!-- Pagination -->
<div class="mt-4 d-flex justify-content-center">
     {!!$employees->links()!!}
</div>
<!-- End Pagination -->
