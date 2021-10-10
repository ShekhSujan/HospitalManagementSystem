@extends('backend.app.index')
@section('content')
    @if(Auth::guard('admin')->user()->p_insert==1)
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.appointment.index')}}">All Appointment List</a></li>
    </ol>
  </div>
  <!-- Page header end -->
  <script>
  $(document).ready(function() {
    xyz();
    $('select[name="speciality_id"]').on('change', function(){
      xyz();
    });
    function xyz(){
      var speciality_id = $('#speciality_id').val();
      if(speciality_id) {
        $.ajax({
          url: "{{url('/dashboard/doc/') }}/"+speciality_id,
          type:"GET",
          dataType:"json",
          success:function(data) {
            var d =$('select[name="doctor_id"]').empty();
            $.each(data, function(key, value){
              $('select[name="doctor_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
            });
          },
        });
      }
      else {
        // alert('Some Error Occsssurs');
      }
    }
  });
</script>
<!-- Main container start -->
<div class="main-container">
  <!-- Row start -->
  <div class="row  gutters">
    @include('backend.pages.notify.message')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card m-0">
        <div class="card-body">
          <a href="{{ route('backend.appointment.create') }}" class="btn btn-info btn-sm">New Appointment</a>
          <a href="{{ route('backend.appointment.index') }}" class="btn btn-success btn-sm">All Appointment</a>
          <form action="{{ route('backend.appointment.store') }}" method="POST" enctype="multipart/form-data">
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
                  <label for="inputSubject" class="col-form-label">Age</label>
                  <input type="number" name="age" value="{{ old('age') }}" class="form-control" placeholder="Enter  Age" required>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Image</label>
                  <input class="form-control"  id="imgInp" name="pic" type="file" >
                  <img src="" id="imgload" width="80"/>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                <h4>Appointment Data Section:</h4>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Speciality</label>
                  <select name="speciality_id" id="speciality_id" class="form-control" required>
                    <option value="">-Select Speciality-</option>
                    @foreach($allSpeciality as $value)
                      @if ($value->default_speciality == 1)
                        <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                      @else
                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Doctor</label>
                  <select name="doctor_id" class="form-control" required>
                    <option value="">-Select Doctor-</option>
                  </select>
                </div>
              </div>

              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Checkup Date</label>
                  <input type="date" name="checkup_date" value="{{ old('checkup_date') }}" class="form-control" placeholder="Enter Patient Checkup Date" required>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Appointment Status</label>
                  <select name="app_status" class="form-control">
                    <option value="2"> Approved</option>
                    <option value="1"> Cancle</option>
                    <option value="0"> Pending</option>
                  </select>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Payment Method</label>
                  <select name="payment_id" class="form-control">
                    <option value="1"> Cash</option>
                    <option value="2"> Bkash</option>
                    <option value="3"> Rocket</option>
                  </select>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Amount</label>
                  <input type="text" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Amount">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Remarks</label>
                  <input type="text" name="remarks" value="{{ old('remarks') }}" class="form-control" placeholder="Remarks">
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
