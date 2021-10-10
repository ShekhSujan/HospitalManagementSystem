@extends('backend.app.index')
@section('content')

<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.admins.create')}}">All Users</a></li>
    </ol>
</div>
<div class="main-container">
    <div class="row  gutters">
        @include('backend.pages.notify.message')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="table-container">
              <a href="{{ route('backend.admins.create') }}" class="btn btn-info btn-sm">Add New</a>
              <a href="{{ route('backend.admins.index') }}" class="btn btn-success btn-sm">All Users</a>
                <div class="table-responsive">
                    <table id="print-table1" class="table custom-table @if (count($allAdmins)>0) css-serial @endif">
                        <thead>
                            <tr>
                                <th>SL:</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allAdmins as $key =>$value)
                            <tr>
                                <td></td>
                                <td>
                                  @if($value->image=="")<img src="{{ asset("assets/images/default/user.png") }}" width="50"/>
                                  @else<img src="{{ asset("assets/images/admins/{$value->id}.{$value->image}") }}" width="50"/>
                                  @endif
                              </td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                @if($value->role==3)<td> <span class="badge badge-info">Admin</span></td>
                                @elseif($value->role==2)<td><span class="badge badge-success">Doctor</span></td>
                                @else<td><span class="badge badge-success">Operator</span></td>
                                @endif
                                <td>
                                  @if ($value->p_insert==1)<span class="badge badge-primary">Insert</span>@endif
                                  @if ($value->p_update==1)<span class="badge badge-info">Update</span>@endif
                                  @if ($value->p_approve==1)<span class="badge badge-success">Approve</span>@endif
                                  @if ($value->p_delete==1)<span class="badge badge-danger">Delete</span>@endif
                                </td>
                                <td>
                                  <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input st-id" value="{{$value->id}}" data-id="{{$value->status}}"  @if($value->status==1) checked @endif id="customSwitch{{$value->id}}">
                                    <label class="custom-control-label" for="customSwitch{{$value->id}}"></label>
                                  </div>
                                    <a href="{{ route("backend.admins.view", $value->id) }}"><span class="btn btn-success btn-sm" title="View Row"><i class="icon-zoom_out_map"></i></span></a>
                                    <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-x"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <!-- ################# Small modal ####################-->
                    @include('backend.pages.admins.delete-modal')
                    @include('backend.pages.admins.script')
                    <!-- Main container end -->
                </div>
            </div>
        </div>
        </form>

    </div>
    <!-- Row end -->
</div>
<!-- Main container end -->
@endsection
