@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.setting.edit',1)}}">Setting</a></li>
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
                    <div class="card-title">Update Setting</div>
                </div>
                <div class="card-body">
                    <form  action="{{ route('backend.setting.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $selected->id }}">
                        <input type="hidden" name="ext" value="{{ $selected->logo }}">
                        <input type="hidden" name="ext2" value="{{ $selected->ficon }}">
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Email</label>
                                    <input type="text" name="email" placeholder="Enter Site Email"  class="form-control" value="{{ $selected->email }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">CC</label>
                                    <input type="text" name="cc" placeholder="Enter Site CC"  class="form-control" value="{{ $selected->cc }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">BCC</label>
                                    <input type="text" name="bcc" placeholder="Enter Site Bcc"  class="form-control" value="{{ $selected->bcc }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Phone</label>
                                    <input type="text" name="phone" placeholder="Enter Site Phone"  class="form-control" value="{{ $selected->phone }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Address</label>
                                    <input type="text" name="address" placeholder="Enter Site Address"  class="form-control" value="{{ $selected->address }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Schedule</label>
                                    <input type="text" name="schedule" placeholder="Enter Site Schedule"  class="form-control" value="{{ $selected->schedule }}">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Short Description</label>
                                    <textarea  name="details" class="form-control" value="">{{ $selected->details }}</textarea>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Site Map</label>
                                    <textarea  name="map" class="form-control" value="">{{ $selected->map }}</textarea>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Logo</label>
                                    <input class="form-control" id="imgInp" name="pic" type="file"><br>
                                    <img src="{{ asset("assets/images/logo/{$selected->id}-logo.{$selected->logo}") }}" alt="No Image" id="imgload"  width="80"/>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Favicon</label>
                                    <input class="form-control form-control-alt" id="imgInp2" name="pic2" type="file"><br>
                                    <img src="{{ asset("assets/images/logo/{$selected->id}-ficon.{$selected->ficon}") }}" alt="No Image" id="imgload2" width="80"/>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group pl-1">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm-update">Update Setting</button>
                                </div>
                            </div>
                            <!-- ################# Small modal ####################-->
                            @include('backend.pages.modal.update-modal')
                            <!-- Main container end -->
                        </div>
                </div>
                </form>
                <!-- Row end -->
            </div>
        </div>
    </div>
    <!-- Main container end -->
    @endsection
