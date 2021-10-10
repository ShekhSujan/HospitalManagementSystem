@extends('backend.app.index')
@section('content')
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.doctor.index')}}">Doctor</a></li>
    </ol>
  </div>
  <!-- Page header end -->
  <!-- Main container start -->
  <div class="main-container">
  <div id="notes"></div>
    <div class="row gutters">
      @include('backend.pages.notify.message')
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container"id="statusa">
          <a href="{{ route('backend.doctor.create') }}" class="btn btn-info btn-sm">Add New</a>
          <a href="{{ route('backend.doctor.index') }}" class="btn btn-success btn-sm">All Doctor</a>
          <div class="table-responsive">
            <table id="print-table1" class="table custom-table @if (count($allDoctor)>0) css-serial @endif">
              <thead>
                <tr>
                  <th >SL:</th>
                  <th >Image</th>
                  <th >Name</th>
                  <th >Email</th>
                  <th >Speciality</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allDoctor as $key =>$value)
                  <tr>
                    <td></td>
                    @if($value->image=="")
                      <td> <img src="{{ asset("assets/images/default/user.png") }}" width="50"/></td>
                    @else
                      <td> <img src="{{ asset("assets/images/doctor/{$value->id}.{$value->image}") }}" width="50"/></td>
                    @endif
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->speciality_title}}</td>
                    <td>
                      @if(Auth::guard('admin')->user()->p_update==1)
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input st-id" value="{{$value->id}}" data-id="{{$value->status}}"  @if($value->status==1) checked @endif id="customSwitch{{$value->id}}">
                            <label class="custom-control-label" for="customSwitch{{$value->id}}"></label>
                          </div>
                        @endif
                        <a href="{{ route("backend.doctor.edit", $value->id) }}" title="Edit Row"><span class="btn btn-info btn-sm"><i class="icon-zoom_out_map"></i></span></a>
                        @if(Auth::guard('admin')->user()->p_delete==1)
                          <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-x"></i></button>
                        @endif
                      </td>
                    @endforeach
                  </tbody>
                </table>
                <!-- ################# Small modal ####################-->
                @include('backend.pages.doctor.delete-modal')
                @include('backend.pages.doctor.script')
                <!-- ################# Small modal ####################-->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Main container end -->
    @endsection
