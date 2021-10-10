@extends('backend.app.index')
@section('content')
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.employee.index')}}">All Employee</a></li>
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
                <form action="{{route('backend.employee.report')}}" method="get" enctype="multipart/form-data">
                  {{-- @csrf --}}
                  <div class="row gutters justify-content-center">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 text-right">
                      <label for="inputSubject" class="col-form-label pr-3">Employee Report:</label>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-right">
                      <div class="form-group">
                        <select name="department" class="form-control" >
                          <option value="">Select Department</option>
                          @foreach($allDepartment as $value)
                            <option value="{{$value->id}}">{{$value->title}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-right">
                      <div class="form-group">
                        <select name="designation" class="form-control" >
                          <option value="">Select Designation</option>
                          @foreach($allDesignation as $value)
                            <option value="{{$value->id}}">{{$value->title}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 pt-1">
                      <button type="submit" class="btn btn-primary btn-sm px-3 mx-2 mb-1"><i class="icon-export"></i></button>
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

      @isset($allEmployee)
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="table-container"id="statusa">
            <div class="table-responsive">
              <form style="overflow: hidden;" action="{{route('backend.employee.bulk_destroy')}}" method="post">
                @csrf
                <table id="highlightRowColumn" class="table custom-table">
                  <thead>
                    <tr>
                      <th data-orderable="false"><input type="checkbox" id="chkSelectAll"/>&nbsp&nbspSL:</th>
                      <th data-orderable="false">Image</th>
                      <th data-orderable="false">Name</th>
                      <th data-orderable="false">Email</th>
                      <th data-orderable="false">Phone</th>
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
                    @foreach($allEmployee as $key =>$value)
                      <tr>
                        <td>
                          <input type="checkbox" name="chk[]" class="chkDel" value="{{$value->id}}"/>&nbsp;&nbsp;{{$key+1}}
                        </td>
                        <td> <img src="{{ asset("assets/images/employee/{$value->id}-{$value->slug}.{$value->image}") }}" width="60"/></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->phone}}</td>
                        <td>
                          @if($value->status==1)
                            <span class="btn btn-warning btn-sm" title="Active"><i class="icon-eye"></i></span>
                          @else
                            <span class="btn btn-secondary btn-sm" title="Inactive"><i class="icon-eye"></i></span>
                          @endif
                          <a href="{{ route("backend.employee.view", $value->id) }}"><span class="btn btn-success btn-sm" title="View Row"><i class="icon-zoom_out_map"></i></span></a>
                          {{-- <a href="{{ route("backend.employee.edit", $value->id) }}" title="Edit Row"><span class="btn btn-info btn-sm"><i class="icon-edit1"></i></span></a> --}}
                          <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-x"></i></button>
                        </td>
                      @endforeach
                    </tbody>
                  </table>
                </form>
                <!-- ################# Small modal ####################-->
                @include('backend.pages.employee.delete-modal')
                <!-- Main container end -->
              </div>
            </div>
          </div>
        @endisset
      </div>
    </div>
    <!-- Main container end -->
  @endsection
