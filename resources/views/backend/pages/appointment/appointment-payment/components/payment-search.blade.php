<form action="{{route('backend.view_appointment_payment_report')}}" method="get" enctype="multipart/form-data">
    {{-- @csrf --}}
    <div class="row gutters justify-content-center">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-right">
          <div class="form-group">
              <label for="inputSubject" class="col-form-label pr-3">Start Date Range:</label>
            <input class="form-control" type="date" name="start_date" value="" placeholder="Start Date">
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-right">
          <div class="form-group">
              <label for="inputSubject" class="col-form-label pr-3">End Date Range:</label>
            <input class="form-control" type="date" name="end_date" value="" placeholder="End Date">
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
              <div class="form-group">
                  <label for="inputSubject" class="col-form-label pr-3">Payment Method:</label>
                  <select name="payment_id" class="form-control">
                      <option value=""> Select Payment Method</option>
                      <option value="1"> Cash</option>
                      <option value="2"> Bkash</option>
                      <option value="3"> Rocket</option>
                  </select>
              </div>
          </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 m-auto">
            <button type="submit" class="btn btn-primary btn-md px-3 mt-3"><i class="icon-export"></i></button>
        </div>
        </div>
    </div>
</div>
</form>
