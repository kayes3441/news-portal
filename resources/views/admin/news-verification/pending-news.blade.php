@extends('layout.admin.master')
@section('title') Pending News  @endsection
@section('doc-title') Pending News  @endsection
@section('add-css')

@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-nowrap px-1">Pending News ({{$pending_news->count()}})</h4>
                        <form class="ml-auto" action="{{route('admin.category.index')}}" method="get">
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending_news as $key=>$news)
                                    <tr>
                                        <td>{{$pending_news->firstItem()+$key}}</td>
                                        <td>{{$news->news_cover_by}}y</td>
                                        <td>{{$news->title}}</td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0 justify-content-center">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-success"><i class="mdi mdi-read">Verify</i></a>
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
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('js')@include('admin.category.script')@endsection --}}
