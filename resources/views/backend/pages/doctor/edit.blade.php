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
  <div class="main-container">

    <!-- Row start -->
    <div class="row gutters">
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="account-settings">
              <div class="user-profile">
                <div class="user-avatar">
                  @if($selected->image=="")
                    <img src="{{ asset("assets/images/default/user.png") }}" alt="" />
                  @else
                    <img src="{{ asset("assets/images/doctor/{$selected->id}.{$selected->image}") }}" alt="" />
                  @endif
                </div>
                <h5 class="user-name">{{ $selected->name }}</h5>
                <h6 class="user-email">{{ $selected->email }}</h6>
              </div>
              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <tbody>
                    <tr>
                      <td class="font-weight-bold">Phone</td>
                      <td>{{$selected->phone}}</td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Organization</td>
                      <td>{{$selected->organization}}</td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Designation</td>
                      <td>{{$selected->designation}}</td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Address</td>
                      <td>{{$selected->address}}</td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Status</td>
                      <td>
                        @if($selected->status==1)
                          <span class="badge badge-success">Updated</span>
                        @else
                          <span class="badge badge-danger">Pending</span>
                        @endif
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <form  action="{{ route('backend.doctor.update') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{ $selected->id }}">
              <input type="hidden" name="ext" value="{{ $selected->image }}">
              <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Name</label>
                    <input type="text" name="name" value="{{$selected->name}}" class="form-control" placeholder="Enter  Name" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Email</label>
                    <input type="email" name="email" value="{{$selected->email}}" class="form-control" placeholder="Enter  Email" >
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Phone</label>
                    <input type="text" name="phone" value="{{$selected->phone}}" class="form-control" placeholder="Enter  Phone" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Organization</label>
                    <input type="text" name="organization" value="{{$selected->organization}}" class="form-control" placeholder="Enter  Organization" >
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Designation</label>
                    <input type="text" name="designation" value="{{$selected->designation}}" class="form-control" placeholder="Enter  Designation" >
                  </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Address</label>
                    <input type="text" name="address" value="{{$selected->address}}" class="form-control" placeholder="Enter  Address" >
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Speciality</label>
                    <select name="speciality_id" class="form-control">
                      @foreach ($allSpeciality as $value)
                        @if ($selected->speciality_id == $value->id)
                          <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                        @else
                          <option value="{{ $value->id }}">{{ $value->title }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Permissions</label><br/>
                    <div class="form-control border">
                      <div class="form-check form-check-inline">
                        <input name="p_insert" value="1" @if($permission[0]==1) ? checked="" @endif class="form-check-input" type="checkbox" >
                          <label  class="form-check-label" for="inlineCheckbox1">Insert</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input  name="p_update" @if($permission[1]==1) ? checked="" @endif value="1" class="form-check-input" type="checkbox" >
                            <label class="form-check-label" for="inlineCheckbox2">Update</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input name="p_delete" @if($permission[3]==1) ? checked="" @endif value="1" class="form-check-input" type="checkbox" >
                              <label class="form-check-label" for="inlineCheckbox3">Delete</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input name="p_approve" @if($permission[2]==1) ? checked="" @endif value="1" class="form-check-input" type="checkbox">
                                <label class="form-check-label" for="inlineCheckbox3">Approve</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                          <div class="form-group">
                            <label for="inputSubject" class="col-form-label">Doctor Image</label>
                            <input class="form-control"  id="imgInp" name="pic" type="file" >
                            <img src="{{ asset("assets/images/doctor/{$selected->id}.{$selected->image}") }}" alt="No Image" id="imgload" width="80"/>
                          </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                          <div class="form-group">
                            <label for="inputSubject" class="col-form-label">Status</label>
                            <select name="status" class="form-control">
                              @if ($selected->status == 1)
                                <option selected value="1"> Approved</option>
                                <option value="0"> Pending</option>
                              @else
                                <option  value="1"> Approved</option>
                                <option selected value="0"> Pending</option>
                              @endif
                            </select>
                          </div>
                        </div>
                            @if(Auth::guard('admin')->user()->p_update==1)
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm-update">Update Profile</button>
                          </div>
                        </div>
                      @endif
                      </div>
                    </div>
                    <!-- ################# Small modal ####################-->
                    @include('backend.pages.modal.update-modal')
                    <!-- ################# Small modal ####################-->
                  </form>
                  <!-- Row end -->
                </div>
              </div>
            </div>
          </div>
          <!-- Row end -->
        </div>
      @endsection
