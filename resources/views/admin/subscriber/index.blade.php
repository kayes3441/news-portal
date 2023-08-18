@extends('layout.admin.master')
@section('title') Subcriber  @endsection
@section('doc-title') Subcriber  @endsection
@section('add-css')

@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-nowrap px-1">Subcriber ({{$subscribers->total()}})</h4>
                        <form class="ml-auto" action="{{route('admin.news.pending-news')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{request('search')}}" id="inputGroupFile02">
                                <button type="submit" class="input-group-text" for="inputGroupFile02">Serach</button>
                              </div>
                        </form>
                    </div> --}}
                    <div class="table-responsive">
                        <table class="table text-center text-nowrap">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $key=>$subscriber)
                                    <tr>
                                        <td>{{$subscribers->firstItem()+$key}}</td>
                                        <td>{{$subscriber->email}}</td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0 justify-content-center">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" onclick="route_alert('{{route('admin.subscriber.delete',['id'=>$subscriber->id])}}','Subscriber will be deleted')" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        {!!$subscribers->links()!!}
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('js')@include('admin.category.script')@endsection --}}
