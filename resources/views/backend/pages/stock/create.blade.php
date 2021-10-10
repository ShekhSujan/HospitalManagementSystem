@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.medicine.index')}}">Medicine</a></li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
    <!-- Row start -->
    <div class="row  gutters">
        @include('backend.pages.notify.message')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="table-container">
                <a href="{{ route('backend.medicine.create') }}" class="btn btn-info btn-sm">Add New Medicine</a>
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="{{route('backend.medicine.bulk_destroy')}}" method="post">
                        @csrf
                        <table id="highlightRowColumn" class="table custom-table css-serial">
                            <thead>
                                <tr>
                                    <th data-orderable="false"><input type="checkbox" id="chkSelectAll"/>&nbsp&nbspSL:</th>
                                    <th>Title</th>
                                    <th>Stock</th>
                                    <th data-orderable="false">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm-bulk">Bulk Delete</button>
                                            </div>
                                            <!-- ################# Small modal ####################-->
                                            @include('backend.pages.modal.bulk-delete-modal')
                                            <!-- Main container end -->
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allMedicine as $key =>$value)
                                <tr>
                                    <td><input type="checkbox" name="chk[]" class="chkDel" value="{{$value->id}}"/>&nbsp;&nbsp;</td>
                                    <td>{{$value->title}}</td>
                                  <td>
                                    @if ($value->stock==0)
                                      <span class="badge badge-danger">Out Of Stock</span>
                                    @else
                                        {{$value->stock}}
                                    @endif
                                  </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-add"></i></button>
                                        <a href="{{route("backend.stock.view",$value->id)}}" class="btn btn-success btn-sm" title="Delete Row"><i class="icon-zoom_out_map"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <!-- ################# Small modal ####################-->
                    @include('backend.pages.stock.stock-modal')
                    <!-- Main container end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
