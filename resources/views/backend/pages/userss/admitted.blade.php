@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.users.index')}}">All Patients List</a></li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
    <!-- Row start -->
    <div class="row gutters">
        @include('backend.pages.notify.message')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="table-container"id="statusa">
                <div class="table-responsive">
                      <table id="print-table1" class="table custom-table @if (count($allUsers)>0) css-serial @endif">
                            <thead>
                                <tr>
                                    <th data-orderable="false">&nbsp&nbspSL:</th>
                                    <th data-orderable="false">Image</th>
                                    <th data-orderable="false">Name</th>
                                    <th data-orderable="false">Phone</th>
                                    <th data-orderable="false">Admited</th>
                                    <th data-orderable="false">Discharge</th>
                                    <th data-orderable="false">
                                        <div class="btn-group">
                                        Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allUsers as $key =>$value)
                                <tr>
                                    <td>
                                    </td>
                                    <td> <img src="{{ asset("assets/images/users/{$value->id}.{$value->image}") }}" width="50"/></td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->date}}</td>
                                    <td>
                                    @if ($value->discharge=="")
                                      <span class="badge badge-primary">Currently Admited</span>
                                    @else
                                        <span class="badge badge-primary">{{$value->discharge}}</span>
                                    @endif
                                    </td>
                                    @if(Auth::guard('admin')->user()->role==1 || Auth::guard('admin')->user()->role==3)
                                      <td>
                                        <a href="{{ route("backend.users.view", $value->id) }}"><span class="btn btn-info btn-sm mr-1" title="View Row"><i class="icon-zoom_out_map"></i></span></a>
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
