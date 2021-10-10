@extends('backend.app.index')
@section('content')
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.pos.index')}}">All Invoice</a></li>
    </ol>
  </div>
  <div class="main-container">
    <div class="row gutters">
      @include('backend.pages.notify.message')
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container"id="statusa">
          <div class="table-responsive">
            <a href="{{ route('backend.pos.create') }}" class="btn btn-info btn-sm">Create New</a>
            <form style="overflow: hidden;" action="{{route('backend.pos.bulk_destroy')}}" method="post">
              @csrf
              <table id="print-table2" class="table custom-table css-serial">
                <thead>
                  <tr>
                    <th data-orderable="false"><input type="checkbox" id="chkSelectAll"/>&nbsp&nbspSL:</th>
                    <th data-orderable="false">Inv-No</th>
                    <th data-orderable="false">Name</th>
                    <th data-orderable="false">Email</th>
                    <th data-orderable="false">Phone</th>
                    <th data-orderable="false">Total</th>
                    <th data-orderable="false">Date</th>
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
                  @foreach($allInvoice as $key =>$value)
                    <tr>
                      <td>
                        <input type="checkbox" name="chk[]" class="chkDel" value="{{$value->id}}"/>&nbsp;&nbsp;
                      </td>
                      <td>Inv-{{$value->id}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->phone}}</td>
                      <td>{{$value->total}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>
                        <a href="{{ route("backend.pos.view", $value->id) }}"><span class="btn btn-success btn-sm" title="View Row"><i class="icon-zoom_out_map"></i></span></a>
                        <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-x"></i></button>
                      </td>
                    @endforeach
                  </tbody>
                </table>
              </form>
              <!-- ################# Small modal ####################-->
              @include('backend.pages.pos.delete-modal')
              <!-- Main container end -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main container end -->
  @endsection
