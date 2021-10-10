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
<!-- Modal -->
<div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{route("backend.newAppointment")}}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="customModalTwoLabel">New Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id-app" value="">
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
          <div class="form-group">
              <label for="inputSubject" class="col-form-label">Doctor</label>
              <select name="doctor_id" class="form-control" required>
                  <option value="">-Select Doctor-</option>
              </select>
          </div>
          <div class="form-group">
              <label for="inputSubject" class="col-form-label">Checkup Date</label>
              <input type="date" name="checkup_date" value="{{ old('checkup_date') }}" class="form-control" placeholder="Enter Patient Checkup Date" required>
          </div>
          <div class="form-group">
              <label for="inputSubject" class="col-form-label">Appointment Status</label>
              <select name="app_status" class="form-control">
                  <option value="2"> Approved</option>
                  <option value="1"> Cancle</option>
                  <option value="0"> Pending</option>
              </select>
          </div>
          <div class="form-group">
              <label for="inputSubject" class="col-form-label">Payment Method</label>
              <select name="payment_id" class="form-control">
                  <option value="1"> Cash</option>
                  <option value="2"> Bkash</option>
                  <option value="3"> Rocket</option>
              </select>
          </div>
          <div class="form-group">
              <label for="inputSubject" class="col-form-label">Amount</label>
              <input type="text" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Amount">
          </div>

          <div class="form-group">
              <label for="inputSubject" class="col-form-label">Remarks</label>
              <input type="text" name="remarks" value="{{ old('remarks') }}" class="form-control" placeholder="Remarks">
          </div>
        </div>
        <div class="modal-footer custom">
          <div class="left-side">
            <button type="button" class="btn btn-link danger btn-sm" data-dismiss="modal">Cancel</button>
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="submit" class="btn btn-link success btn-sm">Save Appointment</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
