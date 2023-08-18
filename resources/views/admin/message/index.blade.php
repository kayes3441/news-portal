@extends('layout.admin.master')
@section('title') Message  @endsection
@section('doc-title') Message  @endsection
@section('add-css')

@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-nowrap px-1">Message ({{$messages->total()}})</h4>
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
                                <th>name</th>
                                <th>Email</th>
                                <th>message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $key=>$message)
                                    <tr>
                                        <td>{{$messages->firstItem()+$key}}</td>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->message}}</td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0 justify-content-center">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" onclick="route_alert('{{route('admin.message.delete',['id'=>$message->id])}}','Message will be deleted')" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        {!!$messages->links()!!}
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('js')@include('admin.category.script')@endsection --}}
