<div class="table-responsive">
    <table class="table" >
        <thead class="table-info">
        <tr class="text-center">
            <th>Sl</th>
            <th>Name</th>
            <th>Category</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($sub_categories as $key=>$sub_category)
                <tr class="table-light text-center ">
                    <td>{{$sub_categories->firstItem()+$key}}</td>
                    <td>{{$sub_category['name']}}</td>
                    <td>{{$sub_category->parent['name']}}</td>
                    <td>{{$sub_category['priority']}}</td>
                    <td>
                        <div class="form-check form-switch d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" onchange="change_status()" id="status_check" {{$sub_category['status'] == 1 ? 'checked' : ''}}>
                        </div>
                    </td>
                    <td >
                        <ul class="list-unstyled hstack gap-1 mb-0 justify-content-center">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
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
     {!!$sub_categories->links()!!}
</div>
<!-- End Pagination -->
