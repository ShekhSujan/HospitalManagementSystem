@extends('backend.app.index')
@section('content')
          @if(Auth::guard('admin')->user()->p_insert==1)
<!-- Page header start -->
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
          <form action="{{ route('backend.employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h5 class="pt-2 text-center">Personal Info</h5>
              </div>
              <hr/>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Name</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter  Name" required>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Email</label>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter  Email" required>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Phone</label>
                  <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter  Phone" required>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">NID</label>
                  <input type="Number" name="nid" value="{{ old('nid') }}" class="form-control" placeholder="Enter  NID" required>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">DOB</label>
                  <input type="date" name="dob" value="{{ old('dob') }}" class="form-control" placeholder="Enter  DOB" required>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Gender</label>
                  <select name="gender" class="form-control" required>
                    <option value="1"> Male</option>
                    <option value="2"> Female</option>
                    <option value="3"> Others</option>
                  </select>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Religion</label>
                  <select name="religion" class="form-control" required>
                    <option value="1"> Islam</option>
                    <option value="2"> Christianity</option>
                    <option value="3"> Hinduism</option>
                    <option value="4"> Others</option>
                  </select>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Last Education</label>
                  <select name="last_education" class="form-control" required>
                    <option>Select Education</option>
                    @foreach($allEducation as $value)
                    <option value="{{$value->id}}">{{$value->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Result[gpa]</label>
                  <input type="text" name="result" value="{{ old('result') }}" class="form-control" placeholder="Enter  Result" required>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Maritial Status</label>
                  <select name="maritial_status" class="form-control" required>
                    <option value="1"> Single</option>
                    <option value="2"> Married</option>
                  </select>
                </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Address</label>
                  <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Enter  Address" required>
                </div>
              </div>

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Employee Image</label>
                  <input class="form-control"  id="imgInp" name="pic" type="file" required>
                  <img src="" id="imgload" width="100"/>
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
                    <option value="{{$value->id}}">{{$value->title}}</option>
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
                    <option value="{{$value->id}}">{{$value->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Joining Date</label>
                  <input type="date" name="joining_date" value="{{ old('joining_date') }}" class="form-control" placeholder="Enter  Joining Date" required>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Salary</label>
                  <input type="number" name="salary" value="{{ old('salary') }}" class="form-control" placeholder="Enter Salary" required>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Increment Details</label>
                  <input type="text" name="increment_details" value="{{ old('increment_details') }}" class="form-control" placeholder="Enter Increment Details" required>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h5 class="pt-2 text-center">Emmergency Contact</h5>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Contact Name</label>
                  <input type="text" name="emergency_name" value="{{ old('emergency_name') }}" class="form-control" placeholder="Enter Contact Name" required>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Contact Phone</label>
                  <input type="text" name="emergency_phone" value="{{ old('emergency_phone') }}" class="form-control" placeholder="Enter Contact Phone" required>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Contact Address</label>
                  <input type="text" name="emergency_address" value="{{ old('emergency_address') }}" class="form-control" placeholder="Enter Contact Address" required>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h5 class="pt-2 text-center">Bank Info</h5>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Bank Name</label>
                  <input type="text" name="bank_name" value="{{ old('bank_name') }}" class="form-control" placeholder="Enter Bank Name">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Account Number</label>
                  <input type="text" name="bank_number" value="{{ old('bank_number') }}" class="form-control" placeholder="Enter Account Number">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Bank Branch</label>
                  <input type="text" name="bank_branch" value="{{ old('bank_branch') }}" class="form-control" placeholder="Enter Bank Branch">
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary float-left">Save Employee</button>
                </div>
              </div>
            </div>
          </div>
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
