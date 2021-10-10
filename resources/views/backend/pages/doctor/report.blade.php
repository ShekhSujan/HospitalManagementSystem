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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-3">
        <div class="card m-0">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="card-body">
                <form action="{{route('backend.doctor_report')}}" method="get" enctype="multipart/form-data">
                  {{-- @csrf --}}
                  <div class="row gutters justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-right">
                      <label for="inputSubject" class="col-form-label pr-3">Doctor By Category/Speciality:</label>
                      <select class="fornm-control" name="speciality_id">
                        <option value="">Select Speciality</option>
                        @foreach ($allSpeciality as $value)
                          <option value="{{$value->id}}">{{$value->title}}</option>
                        @endforeach
                      </select>
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
      @isset($allDoctor)
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="table-container"id="statusa">
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
          @endisset
        </div>
      </div>
      <!-- Main container end -->
    @endsection
