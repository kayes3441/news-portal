@extends('layout.admin.master')
@section('title') Verified News  @endsection
@section('doc-title') Verified News  @endsection
@section('add-css')

@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-nowrap px-1">Verified News ({{$verified_news->total()}})</h4>
                        <form class="ml-auto" action="{{route('admin.news.verified-news')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{request('search')}}" id="inputGroupFile02">
                                <button type="submit" class="input-group-text" for="inputGroupFile02">Serach</button>
                              </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center text-nowrap">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Added By</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($verified_news as $key=>$news)
                                    <tr>
                                        <td>{{$verified_news->firstItem()+$key}}</td>
                                        <td>{{$news->news_cover_by}}</td>
                                        <td>{{$news->title}}</td>
                                        <td>
                                            <span class="badge badge-soft-success">
                                                <i class="mdi mdi-read ">Verified</i>
                                            </span>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0 justify-content-center">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" onclick="route_alert('{{route('admin.news.delete',['id'=>$news->id])}}','News will be deleted')" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        {!!$verified_news->links()!!}
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('js')@include('admin.category.script')@endsection --}}
