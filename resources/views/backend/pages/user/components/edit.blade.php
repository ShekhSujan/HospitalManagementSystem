<div class="card m-0">
  <div class="card-body">
    <form  action="{{ route('backend.users.update') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $selected->id }}">
      <input type="hidden" name="ext" value="{{ $selected->image }}">
      <div class="row gutters">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Name</label>
            <input type="text" name="name" value="{{$selected->name}}" class="form-control" placeholder="Enter  Name" required>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Email</label>
            <input type="email" name="email" value="{{$selected->email}}" class="form-control" placeholder="Enter  Email" >
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Phone</label>
            <input type="text" name="phone" value="{{$selected->phone}}" class="form-control" placeholder="Enter  Phone" required>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Gender</label>
            <select name="gender_id" class="form-control">
              @if ($selected->gender_id == 1)
                <option selected value="1"> Male</option>
                <option value="2"> Female</option>
                <option value="3"> Others</option>
              @elseif ($selected->gender_id == 2)
                <option value="1"> Male</option>
                <option selected value="2"> Female</option>
                <option value="3"> Others</option>
              @else
                <option value="1"> Male</option>
                <option value="2"> Female</option>
                <option selected value="3"> Others</option>
              @endif
            </select>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Religion</label>
            <select name="religion" class="form-control" required>
              @if ($selected->religion == 1)
                <option selected value="1"> Islam</option>
                <option value="2"> Christianity</option>
                <option value="3"> Hinduism</option>
                <option value="4"> Others</option>
              @elseif ($selected->religion == 2)
                <option  value="1"> Islam</option>
                <option selected value="2"> Christianity</option>
                <option value="3"> Hinduism</option>
                <option value="4"> Others</option>
              @elseif ($selected->religion == 3)
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
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Maritial Status</label>
            <select name="maritial_status" class="form-control" required>
              @if ($selected->maritial_status == 1)
                <option selected value="1"> Single</option>
                <option value="2"> Married</option>
              @else
                <option value="1"> Single</option>
                <option selected value="2"> Married</option>
              @endif
            </select>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Age</label>
            <input type="number" name="age" value="{{$selected->age}}" class="form-control" placeholder="Enter  Age" >
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">NID</label>
            <input type="number" name="nid" value="{{$selected->nid}}" class="form-control" placeholder="Enter  NID" >
          </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Medical History</label>
            <input type="text" name="medical_history" value="{{$selected->medical_history}}" class="form-control" placeholder="Enter  Medical History" >
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Patient Image</label>
            <input class="form-control"  id="imgInp" name="pic" type="file" >
            <img src="{{ asset("assets/images/users/{$selected->id}.{$selected->image}") }}" alt="No Image" id="imgload" width="80"/>
          </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
          <h4>Complete If Different from Patient:</h4>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Relation To patient</label>
            <select name="relation" class="form-control">
              @if ($selected->relation == 1)
                <option selected value="1"> Spouse</option>
                <option value="2"> Family Member</option>
                <option value="3"> Relative</option>
              @elseif ($selected->relation == 2)
                <option  value="1"> Spouse</option>
                <option selected value="2"> Family Member</option>
                <option value="3"> Relative</option>
              @else
                <option  value="1"> Spouse</option>
                <option  value="2"> Family Member</option>
                <option selected value="3"> Relative</option>
              @endif
            </select>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Name</label>
            <input type="text" name="guarantor_name" value="{{$selected->guarantor_name}}" class="form-control" placeholder="Enter  Name" >
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Phone</label>
            <input type="number" name="guarantor_phone" value="{{$selected->guarantor_phone}}" class="form-control" placeholder="Enter  Phone" >
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Address</label>
            <input type="text" name="guarantor_address" value="{{$selected->guarantor_address}}" class="form-control" placeholder="Enter  Address" >
          </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h5 class="pt-2 text-center">Emmergency Contact</h5>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Contact Name</label>
            <input type="text" name="emergency_name" value="{{$selected->emergency_name}}" class="form-control" placeholder="Enter  Contact Name" >
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Contact Phone</label>
            <input type="number" name="emergency_phone" value="{{$selected->emergency_phone}}" class="form-control" placeholder="Enter  Contact Phone" >
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Contact Address</label>
            <input type="text" name="emergency_address" value="{{$selected->emergency_address}}" class="form-control" placeholder="Enter  Contact Address" >
          </div>
        </div>
  @if(Auth::guard('admin')->user()->p_update==1)
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="form-group">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm-update">Update Patients</button>
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
