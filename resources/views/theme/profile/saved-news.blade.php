@extends('theme.layout.app')
@section('content')

<div class="container-fluid py-3">
    <div class="container">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Saved News ({{$saved_news->total()}})</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>Sl</th>
                        <th>News Title</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($saved_news as $key=>$news)
                            <tr>
                                <td>1</td>
                                <td>{{ isset($news->news) ? $news->news->title : 'news not fount'}}</td>
                                <td>
                                    <a href="javascript:" onclick="route_alert('{{route('delete-saved-news',['id'=>$news->id])}}','Are you to remove saved news')" class="btn btn-sm btn btn-outline-danger">
                                        <i class="bx bx-trash">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                {!!$saved_news->links()!!}
             </div>
        </div>
    </div>
</div>

    <!-- Contact End -->
@endsection
