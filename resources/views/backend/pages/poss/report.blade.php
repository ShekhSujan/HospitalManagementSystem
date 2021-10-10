@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.pos.index')}}">All Invoice</a></li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
    <div class="row gutters">
        @include('backend.pages.notify.message')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-3">
            <div class="card m-0">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card-body">
                          <form action="{{route('backend.pos.report')}}" method="get" enctype="multipart/form-data">
                              {{-- @csrf --}}
                              <div class="row gutters justify-content-center">
                                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-right">
                                      <label for="inputSubject" class="col-form-label pr-3">Invoice By Date Range:</label>
                                      <a href="#" id="reportrange">
                                          <span class="range-text"></span>
                                          <i class="icon-chevron-down pr-3"></i>
                                      </a>
                                      <input type="hidden" id="s" name="start_date"/>
                                      <input type="hidden" id="e" name="end_date"/>
                                  </div>
                                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 pt-1">
                                      <button type="submit" class="btn btn-primary btn-sm px-3 mx-2 mb-1"><i class="icon-export"></i></button>
                                  </div>
                              </div>
                          </div>
                          </form>
                            <!-- Row end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        @if (count($allInvoice)>0)
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="table-container"id="statusa">
            <div class="table-responsive">
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
                        <td>{{$value->date}}</td>
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
              @endif
    </div>
</div>
<!-- Main container end -->
@endsection
