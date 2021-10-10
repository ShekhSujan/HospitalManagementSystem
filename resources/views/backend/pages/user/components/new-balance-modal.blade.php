<!-- Modal -->
<div class="modal fade" id="customModalTwos" tabindex="-1" role="dialog" aria-labelledby="customModalTwosLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{route("backend.add_balance")}}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="customModalTwoLabel">Add Balance</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="adid" value="">
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Payment Type</label>
            <select name="type" class="form-control" required>
              <option value=""> Select Payment</option>
              <option value="1"> Cash</option>
              <option value="2">BKash</option>
              <option value="3"> Rocket</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Amount</label>
            <input type="text" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Payment Amount">
          </div>
          <div class="form-group">
            <label for="inputSubject" class="col-form-label">Remarks</label>
            <input type="text" name="remarks" value="{{ old('remarks') }}" class="form-control" placeholder="Payment Remarks">
          </div>

        </div>
        <div class="modal-footer custom">
          <div class="left-side">
            <button type="button" class="btn btn-link danger btn-sm" data-dismiss="modal">Cancel</button>
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="submit" class="btn btn-link success btn-sm">Add Balance</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
