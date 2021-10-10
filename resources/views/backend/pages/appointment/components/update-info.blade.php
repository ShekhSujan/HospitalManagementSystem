<script>
$(document).ready(function() {
  $('select[name="speciality_id"]').on('change', function(){
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
    } else {
      alert('Some Error Occsssurs');
    }
  });
});
</script>
<div class="card">
    <div class="card-body">
        <form action="{{route('backend.appointment.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $selected->id }}">
            <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="inputSubject" class="col-form-label">Speciality</label>
                        <select name="speciality_id" id="speciality_id"  class="form-control">
                            <option value=""> Select Speciality</option>
                            @foreach($allSpeciality as $value)
                            @if ($selected->speciality_id == $value->id)
                            <option selected value="{{$value->id}}"> {{$value->title}}</option>
                            @else
                            <option  value="{{$value->id}}"> {{$value->title}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="inputSubject" class="col-form-label">Doctor</label>
                        <select name="doctor_id" class="form-control">
                          <option value=""> Select Doctor</option>
                          @foreach($allDoctor as $value)
                            @if ($selected->doctor_id == $value->id)
                              <option selected value="{{$value->id}}">{{$value->name}}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="inputSubject" class="col-form-label">Checkup Date</label>
                        <input type="date" name="checkup_date" value="{{ $selected->checkup_date }}" class="form-control" placeholder="Checkup Date">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="inputSubject" class="col-form-label">Appointment Status</label>
                        <select name="status" class="form-control">
                            @if ($selected->status == 2)
                            <option selected value="2"> Approved</option>
                            <option value="1"> Cancle</option>
                            <option value="0"> Pending</option>
                            @elseif($selected->status == 1)
                            <option  value="2"> Approved</option>
                            <option selected value="1"> Cancle</option>
                            <option  value="0"> Pending</option>
                            @else
                            <option  value="2"> Approved</option>
                            <option  value="1"> Cancle</option>
                            <option selected  value="0"> Pending</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="inputSubject" class="col-form-label">Payment Method</label>
                        <select name="payment_id" class="form-control">
                            @if($selected->payment_id == 1)
                            <option selected value="1"> Cash</option>
                            <option value="2"> BKash</option>
                            <option value="3"> Rocket</option>
                          @elseif($selected->payment_id == 2)
                              <option  value="1"> Cash</option>
                              <option selected value="2"> BKash</option>
                              <option value="3"> Rocket</option>
                            @else
                              <option  value="1"> Cash</option>
                              <option  value="2"> BKash</option>
                              <option selected value="3"> Rocket</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="inputSubject" class="col-form-label">Amount</label>
                        <input type="text" name="amount" value="{{ $selected->amount }}" class="form-control" placeholder="Amount">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="inputSubject" class="col-form-label">Remarks</label>
                        <input type="text" name="remarks" value="{{ $selected->remarks }}" class="form-control" placeholder="Remarks">
                    </div>
                </div>
                  @if(Auth::guard('admin')->user()->p_update==1)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm-update">Update Appointment</button>
                    </div>
                </div>
              @endif
                <!-- ################# Small modal ####################-->
                @include('backend.pages.modal.update-modal')
                <!-- Main container end -->
            </div>
    </div>
</form>
</div>
</div>
