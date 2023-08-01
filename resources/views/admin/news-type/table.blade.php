<table class="table">
    <thead>
    <tr class="text-center">
        <th>Sl</th>
        <th>News Title</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($news_types as $key=>$news_type)
            <tr class="text-center">
                <td>{{$news_types->firstItem()+$key}}</td>
                <td>{{$news_type->news->title}}</td>
                <td>
                    <div class="form-check form-switch d-flex justify-content-center">
                        <input class="form-check-input change_status" type="checkbox" id="{{$news_type->id}}" {{$news_type['status'] == 1 ? 'checked' : ''}}>
                    </div>
                </td>
                <td >
                    <ul class="list-unstyled hstack gap-1 mb-0 justify-content-center">
                        <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                            <a href="#jobDelete" onclick="route_alert('{{route('admin.news.news-type-delete',['id'=>$news_type->id]) }}','{{$news_type->type}} news will be deleted')"  data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
