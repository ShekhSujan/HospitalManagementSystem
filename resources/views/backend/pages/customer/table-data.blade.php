<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="table-container">
    <div class="t-header">All Customer</div>
    <div class="table-responsive">
      <form style="overflow: hidden;" action="{{route('backend.customer.bulk_destroy')}}" method="post">
        @csrf
        <table id="print-table1" class="table custom-table @if (count($allCustomer)>0) css-serial @endif">
          <thead>
            <tr>
              <th data-orderable="false"><input type="checkbox" id="chkSelectAll"/>&nbsp&nbspSL:</th>
              <th data-orderable="false">Name</th>
              <th data-orderable="false">Email</th>
              <th data-orderable="false">Phone</th>
              <th data-orderable="false">Address</th>
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
            @foreach($allCustomer as $key =>$value)
              <tr>
                <td>
                  <input type="checkbox" name="chk[]" class="chkDel" value="{{$value->id}}"/>&nbsp;&nbsp;
                </td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->phone}}</td>
                <td>{{$value->address}}</td>
                <td>
                  @if(Auth::guard('admin')->user()->p_update==1)
                    <a href="{{ route("backend.customer.edit", $value->id) }}" title="Edit Row"><span class="btn btn-info btn-sm"><i class="icon-edit1"></i></span></a>
                  @endif
                  @if(Auth::guard('admin')->user()->p_delete==1)
                    <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-x"></i></button>
                  @endif
                </td>
              @endforeach
            </tbody>
          </table>
        </form>
        <!-- ################# Small modal ####################-->
        @include('backend.pages.customer.delete-modal')
        <!-- Main container end -->
      </div>
    </div>
  </div>
