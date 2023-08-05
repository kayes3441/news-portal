<table class="table table-editable table-nowrap dataTable no-footer" style="position: relative;">
    <thead>
    <tr>
        <th>Sl</th>
        <th>Title</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($all_news as $key=>$news)
            <tr>
                <td>{{$all_news->firstItem()+$key}}</td>
                <td>{{$news->title}}</td>
                <td>
                    <ul class="list-unstyled hstack gap-1 mb-0 justify-content-center">
                        <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                            <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                        </li>
                        <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                            <a href="#jobDelete" onclick="route_alert('{{route('admin.news.delete',['id'=>$news->id])}}','News will be deleted')" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
