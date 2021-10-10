@extends('backend.app.index')
@section('content')
@else
<script>window.location = "{{ route('backend.unauthorized') }}";</script>
@endif
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.users.index')}}">Patients</a></li>
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
                <div class="card-body">
                    <a href="{{ route('backend.users.create') }}" class="btn btn-info btn-sm">Add New Patients</a>
                    <a href="{{ route('backend.users.index') }}" class="btn btn-success btn-sm">All Patients</a>
                    <form  action="{{ route('backend.users.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $selected->id }}">
                        <input type="hidden" name="ext" value="{{ $selected->image }}">
                        <div class="row gutters">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Name</label>
                                    <input type="text" name="name" value="{{$selected->name}}" class="form-control" placeholder="Enter  Name" required>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Email</label>
                                    <input type="email" name="email" value="{{$selected->email}}" class="form-control" placeholder="Enter  Email" >
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Phone</label>
                                    <input type="text" name="phone" value="{{$selected->phone}}" class="form-control" placeholder="Enter  Phone" required>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Password</label>
                                    <input type="password" name="password"  class="form-control" placeholder="************">
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Gender</label>
                                    <select name="gender_id" class="form-control">
                                        @if ($selected->gender_id == 1)
                                        <option selected value="1"> Male</option>
                                        <option value="2"> Female</option>
                                        <option value="3"> Others</option>
                                        @elseif ($selected->gender_id == 2)
                                        <option value="1"> Male</option>
                                        <option selected value="2"> Female</option>
                                        <option value="3"> Others</option>
                                        @else
                                        <option value="1"> Male</option>
                                        <option value="2"> Female</option>
                                        <option selected value="3"> Others</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Age</label>
                                    <input type="number" name="age" value="{{$selected->age}}" class="form-control" placeholder="Enter  Age" >
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Height(CM)</label>
                                    <input type="number" name="height" value="{{$selected->height}}" class="form-control" placeholder="Enter  Height(CM)" >
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Weight(kg)</label>
                                    <input type="number" name="weight" value="{{$selected->weight}}" class="form-control" placeholder="Enter  Weight(kg)" >
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Patient Image</label>
                                    <input class="form-control"  id="imgInp" name="pic" type="file" >
                                    <img src="{{ asset("assets/images/users/{$selected->id}.{$selected->image}") }}" alt="No Image" id="imgload" width="80"/>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
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
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm-update">Update Patients</button>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- ################# Small modal ####################-->
                @include('backend.pages.modal.update-modal')
                <!-- ################# Small modal ####################-->
                </form>
                <!-- Row end -->
            </div>
        </div>
    </div>
    <!-- Main container end -->
    @endsection
