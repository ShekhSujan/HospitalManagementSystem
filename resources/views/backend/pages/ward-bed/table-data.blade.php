<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
  <div class="table-container">
    <div class="t-header">All Ward & Bed</div>
    <div class="table-responsive">
      <form style="overflow: hidden;" action="{{route('backend.ward-bed.bulk_destroy')}}" method="post">
        @csrf
        <table id="print-table2" class="table custom-table css-serial">
          <thead>
            <tr>
              <th data-orderable="false"><input type="checkbox" id="chkSelectAll"/>&nbsp&nbspSL:</th>
              <th data-orderable="false">Title</th>
              <th data-orderable="false">Bed</th>
              <th data-orderable="false">Daily Charge</th>
              <th data-orderable="false">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </button>
                  <div class="dropdown-menu">
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm-bulk">Bulk Delete</button>
                  </div>
                  <!-- ################# Small modal ####################-->
                  @include('backend.pages.modal.bulk-delete-modal')
                  <!-- Main container end -->
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($allWardBed as $key =>$value)
              <tr>
                <td>
                  <input type="checkbox" name="chk[]" class="chkDel" value="{{$value->id}}"/>&nbsp;&nbsp;
                </td>
                <td>{{$value->title}}</td>
                <td>{{$value->bed}}</td>
                <td>{{$value->charge}}</td>
                <td>
                  @if(Auth::guard('admin')->user()->p_update==1)
                    <a href="{{ route("backend.ward-bed.edit", $value->id) }}" title="Edit Row"><span class="btn btn-info btn-sm"><i class="icon-edit1"></i></span></a>
                  @endif
                  @if(Auth::guard('admin')->user()->p_delete==1)
                    <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-x"></i></button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </form>
      <!-- ################# Small modal ####################-->
      @include('backend.pages.ward-bed.delete-modal')
      <!-- Main container end -->
    </div>
  </div>
</div>
</form>
