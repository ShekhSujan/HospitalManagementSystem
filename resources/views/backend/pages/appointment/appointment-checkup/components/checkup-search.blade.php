<form action="{{route('backend.view_appointment_checkup_report')}}" method="get" enctype="multipart/form-data">
    {{-- @csrf --}}
    <div class="row gutters justify-content-center">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-right">
            <label for="inputSubject" class="col-form-label pr-3">Date Range:</label>
            <a href="#" id="reportrange">
                <span class="range-text"></span>
                <i class="icon-chevron-down pr-3"></i>
            </a>
            <input type="hidden" id="s" name="start_date"/>
            <input type="hidden" id="e" name="end_date"/>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 pt-1">
            <select class="" name="status">
                <option value="">Select Status</option>
                <option value="0">Pending</option>
                <option value="1">Cancled</option>
                <option value="2">Approved</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm px-3 mx-2 mb-1"><i class="icon-export"></i></button>
        </div>
    </div>
</div>
</form>
