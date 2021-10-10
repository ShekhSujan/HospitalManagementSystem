@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.admins.create')}}">Admins</a></li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
    <!-- Row start -->
    <div class="row gutters">
        @include('backend.pages.notify.message')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card m-0">
                <div class="card-header">
                    <div class="card-title">Update Admins</div><br/>
                    <a href="{{ route('backend.admins.create') }}" class="btn btn-info btn-sm">Add New</a>
                </div>
                <div class="card-body">
                    <form  action="{{ route('backend.admins.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $selected->id }}">
                        <input type="hidden" name="ext" value="{{ $selected->image }}">
                        <div class="row gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $selected->name }}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ $selected->email }}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{ $selected->phone }}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $selected->address }}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Password</label>
                                    <input type="text" name="password" class="form-control" placeholder="************">
                                </div>
                            </div>
                            <!-- ############### -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Role</label>
                                    <select class="form-control" name="role">
                                        @if ($selected->status == 1)
                                        <option selected value="1"> Operator</option>
                                        <option value="2"> Doctor</option>
                                        <option value="3">Admin</option>
                                        @elseif($selected->status == 2)
                                        <option  value="1"> Operator</option>
                                        <option selected value="2"> Doctor</option>
                                        <option value="3">Admin</option>
                                        @else
                                        <option  value="1"> Operator</option>
                                        <option  value="2"> Doctor</option>
                                        <option selected value="3">Admin</option>
                                        @endif
                                    </select>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Permissions</label><br/>
                                    <div class="form-control border">
                                        <div class="form-check form-check-inline">
                                            <input name="p_insert" value="1" @if($selected->p_insert==1) ? checked="" @endif class="form-check-input" type="checkbox" id="inlineCheckbox1">
                                                   <label  class="form-check-label" for="inlineCheckbox1">Insert</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input  name="p_update" @if($selected->p_update==1) ? checked="" @endif value="1" class="form-check-input" type="checkbox" id="inlineCheckbox2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Update</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="p_delete" @if($selected->p_delete==1) ? checked="" @endif value="1" class="form-check-input" type="checkbox" id="inlineCheckbox3">
                                                   <label class="form-check-label" for="inlineCheckbox3">Delete</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="p_approve" @if($selected->p_approve==1) ? checked="" @endif value="1" class="form-check-input" type="checkbox" id="inlineCheckbox3">
                                                   <label class="form-check-label" for="inlineCheckbox3">Approve</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ############### -->

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Profile Image [200*200]</label>
                                    <input class="form-control"  id="imgInp" name="pic" type="file" >
                                    <img src="{{ asset("assets/images/admins/{$selected->id}.{$selected->image}") }}" alt="No Image" id="imgload" width="80"/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Status</label>
                                    <select name="status" class="form-control">
                                        @if ($selected->status == 1)
                                        <option selected value="1"> Approved</option>
                                        <option value="0"> Pending</option>
                                        @else
                                        <option  value="1"> Approved</option>
                                        <option selected value="0"> Pending</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!-- ################# Small modal ####################-->
                            @include('backend.pages.modal.update-modal')
                            <!-- Main container end -->
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Main container end -->
@endsection
