<!-- Modal -->
<div class="modal fade" id="customModalTwosc" tabindex="-1" role="dialog" aria-labelledby="customModalTwoscLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{route("backend.add_charges")}}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="customModalTwoLabel">Add Charges</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="adids" value="">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Amount</label>
            <input type="text" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Charges Amount">
          </div>
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Details</label>
            <input type="text" name="details" value="{{ old('details') }}" class="form-control" placeholder="Charges Details">
          </div>
        </div>
        <div class="modal-footer custom">
          <div class="left-side">
            <button type="button" class="btn btn-link danger btn-sm" data-dismiss="modal">Cancel</button>
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="submit" class="btn btn-link success btn-sm">Add Charges</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
