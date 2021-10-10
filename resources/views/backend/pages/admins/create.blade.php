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
        <div class="card m-0">
          <div class="card-body">
            <a href="{{ route('backend.admins.create') }}" class="btn btn-info btn-sm">Add New</a>
            <a href="{{ route('backend.admins.index') }}" class="btn btn-success btn-sm">All Users</a>
            <form action="{{route('backend.admins.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name">
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Email</label>
                    <input id="email" type="email" placeholder="Enter Email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Enter Password">
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Role</label>
                    <select class="form-control" name="role">
                      <option value="">Select Role</option>
                      <option value="3">Admin</option>
                      <option value="1">Operator</option>
                    </select>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Permissions</label><br/>
                    <div class="bo">
                      <div class="form-check form-check-inline">
                        <input name="p_insert" value="1" class="form-check-input" type="checkbox" {{ old('p_insert') ? 'checked' : '' }} id="inlineCheckbox1">
                        <label  class="form-check-label" for="inlineCheckbox1">Insert</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input  name="p_update" value="1" class="form-check-input" type="checkbox" {{ old('p_update') ? 'checked' : '' }} id="inlineCheckbox2">
                        <label class="form-check-label" for="inlineCheckbox2">Update</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input name="p_delete" value="1" class="form-check-input" type="checkbox" {{ old('p_delete') ? 'checked' : '' }} id="inlineCheckbox3">
                        <label class="form-check-label" for="inlineCheckbox3">Delete</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input name="p_approve" value="1" class="form-check-input" type="checkbox" {{ old('p_approve') ? 'checked' : '' }} id="inlineCheckbox4">
                        <label class="form-check-label" for="inlineCheckbox4">Approve</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Image [200*200]</label>
                    <input class="form-control"  id="imgInp" name="pic" type="file" >
                    <img src="" id="imgload" width="80"/>
                  </div>
                </div>
                <div class="form-group pl-2">
                  <button type="submit"  name="submit" class="btn btn-primary btn-sm float-right">Save User</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
