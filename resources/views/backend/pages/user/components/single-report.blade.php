<!-- Row start -->
<div class="row gutters justify-content-center">
  <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
    <div class="info-stats4">
      <div class="info-icon icn-size">
        <button type="button" class="btn btn-sm" id="{{$selected->id}}" onclick="modalview_app(this.id)"  data-toggle="modal" data-target="#customModalTwo"  title="New Appointments">
          <i class="icon-plus-square"></i></span>
        </button>
        @include('backend.pages.users.components.new-appointment-modal')
      </div>
      <div class="sale-num">
        <h6>New</h6>
        <p class="sm">Appointment</p>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
    <div class="info-stats4">
      <div class="info-icon icn-size">
        <button type="button" class="btn btn-sm" id="{{$selected->id}}" onclick="modalview(this.id)"  data-toggle="modal" data-target="#customModalTwos"  title="Add Balance">
          <i class="icon-plus-square"></i></span>
        </button>
        @include('backend.pages.users.components.new-balance-modal')
      </div>
      <div class="sale-num">
        <h6>Add</h6>
        <p class="sm">Balance</p>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
    <div class="info-stats4">
      <div class="info-icon icn-size">
        <button type="button" class="btn btn-sm" id="{{$selected->id}}" onclick="modalviews(this.id)"  data-toggle="modal" data-target="#customModalTwosc"  title="Add Charges">
          <i class="icon-plus-square"></i></span>
        </button>
        @include('backend.pages.users.components.new-charges-modal')
      </div>
      <div class="sale-num">
        <h6>Add</h6>
        <p class="sm">Charge</p>
      </div>
    </div>
  </div>
</div>
<!-- Row end -->
