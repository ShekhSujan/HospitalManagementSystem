@extends('backend.app.index')
@section('content')
  @if(Auth::guard('admin')->user()->p_insert==1)
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.users.index')}}">All Patients List</a></li>
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
            <a href="{{ route('backend.users.create') }}" class="btn btn-info btn-sm">Add New Patients</a>
            <a href="{{ route('backend.users.index') }}" class="btn btn-success btn-sm">All Patients</a>

            <form action="{{ route('backend.users.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
                  <h4>Patient Data Section:</h4>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter  Name" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter  Email" >
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter  Phone" required>
                  </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Gender</label>
                    <select name="gender_id" class="form-control" required>
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
                    <label for="inputSubject" class="col-form-label">Maritial Status</label>
                    <select name="maritial_status" class="form-control" required>
                      <option value="1"> Single</option>
                      <option value="2"> Married</option>
                    </select>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Age</label>
                    <input type="number" name="age" value="{{ old('age') }}" class="form-control" placeholder="Enter  Age" required>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">NID</label>
                    <input type="Number" name="nid" value="{{ old('nid') }}" class="form-control" placeholder="Enter  NID" required>
                  </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Medical History</label>
                    <input type="text" name="medical_history" value="{{ old('medical_history') }}" class="form-control" placeholder="Medical History">
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Image</label>
                    <input class="form-control"  id="imgInp" name="pic" type="file" >
                    <img src="" id="imgload" width="80"/>
                  </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
                  <h4>Complete If Different from Patient:</h4>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Relation To patient</label>
                    <select name="relation" class="form-control" required>
                      <option value=""> Select Relation</option>
                      <option value="1"> Spouse</option>
                      <option value="2"> Family Member</option>
                      <option value="3"> Relative</option>
                    </select>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Name</label>
                    <input type="text" name="guarantor_name" value="{{ old('guarantor_name') }}" class="form-control" placeholder="Enter  Name" >
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Phone</label>
                    <input type="text" name="guarantor_phone" value="{{ old('guarantor_phone') }}" class="form-control" placeholder="Enter  Phone" >
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Address</label>
                    <input type="text" name="guarantor_address" value="{{ old('guarantor_address') }}" class="form-control" placeholder="Enter  Address" >
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
                  <h5 class="pt-2 text-center">Payment</h5>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Payment Type</label>
                    <select name="type" class="form-control" required>
                      <option value=""> Select Payment</option>
                      <option value="1"> Cash</option>
                      <option value="2">BKash</option>
                      <option value="3"> Rocket</option>
                    </select>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Amount</label>
                    <input type="text" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Payment Amount">
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Remarks</label>
                    <input type="text" name="remarks" value="{{ old('remarks') }}" class="form-control" placeholder="Payment Remarks">
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
                  <h4>Admit To Ward:</h4>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Ward & Bed</label>
                    <select name="ward_id" class="form-control">
                      <option value=""> Select Ward & Bed</option>
                      @foreach ($allWardBed as $element)
                          <option value="{{$element->id}}">{{$element->title}}&nbsp Daily Charge &nbsp(${{$element->charge}})</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary float-left btn-sm">Save Patients</button>
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
