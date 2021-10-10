<form action="{{route('backend.view_patient_report')}}" method="get" enctype="multipart/form-data">
  {{-- @csrf --}}
  <div class="row gutters justify-content-center">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 pt-1">
      <label for="inputSubject" class="col-form-label">Gender</label>
      <select name="gender_id" class="form-control">
        <option value=""> Select Gender</option>
        <option value="1"> Male</option>
        <option value="2"> Female</option>
        <option value="2"> Others</option>
      </select>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 pt-1">
      <label for="inputSubject" class="col-form-label">Religion</label>
      <select name="religion" class="form-control">
        <option value=""> Select Religion</option>
        <option value="1"> Islam</option>
        <option value="2"> Christianity</option>
        <option value="2"> Hinduism</option>
        <option value="4"> Others</option>
      </select>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 pt-1">
      <div class="form-group">
        <label for="inputSubject" class="col-form-label">Maritial Status</label>
        <select name="maritial_status" class="form-control">
          <option value=""> Select Maritial Status</option>
          <option value="1"> Single</option>
          <option value="2"> Married</option>
        </select>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 pt-1">
      <div class="form-group">
        <label for="inputSubject" class="col-form-label">Ward & Bed</label>
        <select name="ward_id" class="form-control">
          <option value=""> Select Ward & Bed</option>
          @foreach ($allWardBed as $element)
            <option value="{{$element->id}}">{{$element->title}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 m-auto">
        <button type="submit" class="btn btn-primary btn-md mt-3"><i class="icon-export"></i></button>
    </div>
  </div>
</div>
</div>
</form>
