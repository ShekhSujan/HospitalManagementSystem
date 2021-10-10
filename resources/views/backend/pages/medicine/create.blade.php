@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.medicine.create')}}">Medicine</a></li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
    <!-- Row start -->
    <div class="row  gutters">
        @include('backend.pages.notify.message')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card m-0">
                <div class="card-header">
                    <div class="card-title">Add Medicine</div>
                </div>
                <div class="card-body">
                    <a href="{{ route('backend.medicine.create') }}" class="btn btn-info btn-sm">Add New</a>
                    <a href="{{ route('backend.medicine.index') }}" class="btn btn-success btn-sm">All Medicine</a>
                    <form action="{{route('backend.medicine.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Medicine Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Medicine Title" required/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Medicine Company</label>
                                    <input type="text" name="company" class="form-control" value="{{ old('company') }}" placeholder="Enter Medicine Company" required/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Medicine Dosages</label>
                                    <input type="text" name="dosage" class="form-control" value="{{ old('dosage') }}" placeholder="Enter Medicine Dosages" required/>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Medicine Strength</label>
                                    <input type="text" name="strength" class="form-control" value="{{ old('strength') }}" placeholder="Enter Medicine Strength" required/>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Medicine Generic</label>
                                    <input type="text" name="generic" class="form-control" value="{{ old('generic') }}" placeholder="Enter Medicine Generic" required/>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Unite Price</label>
                                    <input type="number" name="unit_price" class="form-control" value="{{ old('unit_price') }}" placeholder="Enter Unite Price" required/>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Stock</label>
                                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" placeholder="Enter Stock" required/>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary float-left">Save Medicine</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                <!-- Row end -->
            </div>
        </div>
    </div>
</div>
<!-- Row end -->
</div>
<!-- Main container end -->
@endsection
