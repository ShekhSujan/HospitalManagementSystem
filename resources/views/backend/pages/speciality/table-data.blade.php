<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 " id="">
  <div id="notes"></div>
  <div class="table-container" >
    <div class="t-header">All Speciality</div>
    <div class="table-responsive" >
      <form style="overflow: hidden;" action="{{route('backend.speciality.bulk_destroy')}}" method="post">
        @csrf
        <table id="print-table1" class="table custom-table @if (count($allSpeciality)>0) css-serial @endif">
          <thead>
            <tr>
              <th data-orderable="false"><input type="checkbox" id="chkSelectAll"/>&nbsp&nbspSL:</th>
              <th data-orderable="false">Title</th>
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
          <tbody >
            @foreach($allSpeciality as $key =>$value)
              <tr>
                <td>
                  <input type="checkbox" name="chk[]" class="chkDel" value="{{$value->id}}"/>&nbsp;&nbsp;
                </td>

                <td>{{$value->title}}</td>
                <td>
                  @if(Auth::guard('admin')->user()->p_update==1)
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input st-id" value="{{$value->id}}" data-id="{{$value->status}}"  @if($value->status==1) checked @endif id="customSwitch{{$value->id}}">
                        <label class="custom-control-label" for="customSwitch{{$value->id}}"></label>
                      </div>

                      <a href="{{ route("backend.speciality.edit", $value->id) }}" title="Edit Row"><span class="btn btn-info btn-sm"><i class="icon-edit1"></i></span></a>
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
        @include('backend.pages.speciality.delete-modal')
        @include('backend.pages.speciality.script')
        <!-- ################# Small modal ####################-->
      </div>
    </div>
  </div>
</form>
