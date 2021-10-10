@extends('backend.app.index')
@section('content')
          @if(Auth::guard('admin')->user()->p_update==1)
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.employee.index')}}">Employee</a></li>
    </ol>
  </div>
  <!-- Page header end -->
  <!-- Main container start -->
  <div class="main-container">
    <!-- Row start -->
    <div class="row  gutters">
      @include('backend.pages.notify.message')
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card m-0">
          <div class="card-body">
            <a href="{{ route('backend.employee.create') }}" class="btn btn-info btn-sm">Add New</a>
            <a href="{{ route('backend.employee.index') }}" class="btn btn-success btn-sm">All Employee</a>
            <form action="{{ route('backend.employee.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{ $selected->id }}">
              <input type="hidden" name="ext" value="{{ $selected->image }}">
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h5 class="pt-2 text-center">Personal Info</h5>
                </div>
                <hr/>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Name</label>
                    <input type="text" name="name" value="{{ $selected->name }}" class="form-control" placeholder="Enter  Name" required>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Email</label>
                    <input type="email" name="email" value="{{ $selected->email }}" class="form-control" placeholder="Enter  Email" required>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Phone</label>
                    <input type="text" name="phone" value="{{ $selected->phone }}" class="form-control" placeholder="Enter  Phone" required>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">NID</label>
                    <input type="Number" name="nid" value="{{ $selected->nid }}" class="form-control" placeholder="Enter  NID" required>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">DOB</label>
                    <input type="date" name="dob" value="{{ $selected->dob }}" class="form-control" placeholder="Enter  DOB" required>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Gender</label>
                    <select name="gender" class="form-control" required>
                      @if ($selected->gender == 1) Male
                        <option selected value="1"> Male</option>
                        <option value="2"> Female</option>
                        <option value="3"> Others</option>
                      @elseif ($selected->gender == 2)
                        <option  value="1"> Male</option>
                        <option selected value="2"> Female</option>
                        <option  value="3"> Others</option>
                      @else
                        <option  value="1"> Male</option>
                        <option  value="2"> Female</option>
                        <option selected value="3"> Others</option>
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Religion</label>
                    <select name="religion" class="form-control" required>
                      @if ($selected->gender == 1) Male
                        <option selected value="1"> Islam</option>
                        <option value="2"> Christianity</option>
                        <option value="3"> Hinduism</option>
                        <option value="4"> Others</option>
                      @elseif ($selected->gender == 2)
                        <option  value="1"> Islam</option>
                        <option selected value="2"> Christianity</option>
                        <option value="3"> Hinduism</option>
                        <option value="4"> Others</option>
                      @elseif ($selected->gender == 3)
                        <option  value="1"> Islam</option>
                        <option  value="2"> Christianity</option>
                        <option selected value="3"> Hinduism</option>
                        <option value="4"> Others</option>
                      @else
                        <option  value="1"> Islam</option>
                        <option  value="2"> Christianity</option>
                        <option  value="3"> Hinduism</option>
                        <option selected value="4"> Others</option>
                      @endif

                    </select>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Last Education</label>
                    <select name="last_education" class="form-control" required>
                      <option>Select Education</option>
                      @foreach($allEducation as $value)
                        @if ($selected->last_education == $value->id)
                          <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                        @else
                          <option value="{{ $value->id }}">{{ $value->title }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Result</label>
                    <input type="text" name="result" value="{{ $selected->result }}" class="form-control" placeholder="Enter  Result" required>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Maritial Status</label>
                    <select name="maritial_status" class="form-control" required>
                      @if ($selected->maritial_status == 1)
                        <option selected value="1"> Single</option>
                        <option value="2"> Married</option>
                      @else
                        <option  value="1"> Single</option>
                        <option selected value="2"> Married</option>
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Address</label>
                    <input type="text" name="address" value="{{ $selected->address }}" class="form-control" placeholder="Enter  Address" required>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Employee Image</label>
                    <input class="form-control"  id="imgInp" name="pic" type="file" >
                    <img src="{{ asset("assets/images/employee/{$selected->id}-{$selected->slug}.{$selected->image}") }}" alt="No Image" id="imgload" width="80"/>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h5 class="pt-2 text-center">Job Info</h5>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Department</label>
                    <select name="department" class="form-control" required>
                      <option>Select Department</option>
                      @foreach($allDepartment as $value)
                        @if ($selected->department == $value->id)
                          <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                        @else
                          <option value="{{ $value->id }}">{{ $value->title }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Designation</label>
                    <select name="designation" class="form-control" required>
                      <option>Select Designation</option>
                      @foreach($allDesignation as $value)
                        @if ($selected->designation == $value->id)
                          <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                        @else
                          <option value="{{ $value->id }}">{{ $value->title }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Joining Date</label>
                    <input type="date" name="joining_date" value="{{ $selected->joining_date }}" class="form-control" placeholder="Enter  Joining Date" required>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Salary</label>
                    <input type="number" name="salary" value="{{ $selected->salary }}" class="form-control" placeholder="Enter Salary" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Increment Details</label>
                    <input type="text" name="increment_details" value="{{ $selected->increment_details }}" class="form-control" placeholder="Enter Increment Details" required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h5 class="pt-2 text-center">Emmergency Contact</h5>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Contact Name</label>
                    <input type="text" name="emergency_name" value="{{ $selected->emergency_name }}" class="form-control" placeholder="Enter Contact Name" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Contact Phone</label>
                    <input type="text" name="emergency_phone" value="{{ $selected->emergency_phone }}" class="form-control" placeholder="Enter Contact Phone" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Contact Address</label>
                    <input type="text" name="emergency_address" value="{{ $selected->emergency_address }}" class="form-control" placeholder="Enter Contact Address" required>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h5 class="pt-2 text-center">Bank Info</h5>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Bank Name</label>
                    <input type="text" name="bank_name" value="{{ $selected->bank_name }}" class="form-control" placeholder="Enter Bank Name" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Account Number</label>
                    <input type="text" name="bank_number" value="{{ $selected->bank_number }}" class="form-control" placeholder="Enter Account Number" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Bank Branch</label>
                    <input type="text" name="bank_branch" value="{{ $selected->bank_branch }}" class="form-control" placeholder="Enter Bank Branch" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Category Status</label>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm-update">Update Employee</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ################# Small modal ####################-->
            @include('backend.pages.modal.update-modal')
            <!-- Main container end -->
          </form>
          <!-- Row end -->
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->
</div>
@else
<script>window.location = "{{ route('backend.unauthorized') }}";</script>
@endif
@endsection
