@extends('backend.app.index')
@section('content')
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.pos.index')}}">Sales</a></li>
    </ol>
  </div>
  @include('backend.pages.pos.script')
  <div class="main-container">
    <div class="row  gutters">
      @if (session('msg'))
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-body">
              <div class="alert alert-success" role="alert">
                <i class="icon-check_circle"></i>  {{ session('msg') }}
          
                      <a href="{{ route("backend.pos.view", $selected->id) }}" class="alert-link">View Invoice</a>.
          
              </div>
            </div>
          </div>
        </div>
      @endif
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card m-0">
          <div class="card-body">
            <form action="{{route('backend.pos.store')}}" method="post">
              @csrf
              <div class="form-group">
                <div class="input-group">
                  <select name="customer_id" class="form-control selectpicker" data-live-search="true" required>
                    <option value="">Select Customer By Phone</option>
                    @foreach ($allCustomer as $value)
                      <option  value="{{$value->id}}">{{$value->phone}} - {{$value->name}}</option>
                    @endforeach
                  </select>
                  <div class="input-group-append">
                    <button type="button" class="btn btn-primary" id="" data-toggle="modal" data-target="#customModalTwoAdvice"  title="New Appointments">
                      <i class="icon-plus"></i></span></button>
                    </div>
                  </div>
                </div>
                <table class="table custom-table css-serial" id="item">
                  <thead>
                    <tr>
                      <th data-orderable="false">SL</th>
                      <th data-orderable="false">Medicine</th>
                      <th data-orderable="false">Price</th>
                      <th data-orderable="false">Qty</th>
                      <th data-orderable="false">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allCart as $value)
                      <tr>
                        <td></td>
                        <td>{{$value->name}} </td>
                        <td>{{$value->price}}</td>
                        <td>
                          <input type="number" name="qty" class="quantity" data-id="{{$value->rowId}}" value="{{$value->qty}}" min="1" style="width:60px;"/>
                        </td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm updatecart"  data-id='{{$value->rowId}}'><span class="icon-repeat1"></span></button>
                          <button type="button" class="btn btn-danger btn-sm removecart" data-id="{{$value->rowId}}"><span class="icon-close"></span></button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="3" class="text-right border-right">SubTotal:</td>
                      <td class="border-right">Qty:{{Cart::count()}}</td>
                      <td>{{Cart::subtotal()}}</td>
                    </tr>
                    <tr>
                      <td colspan="3" class="text-right border-right">Tax(15%):</td>
                      <td></td>
                      <td>{{Cart::tax()}}</td>
                    </tr>
                    <tr>
                      <td colspan="3" class="text-right border-right">Total:</td>
                      <td></td>
                      <td>{{Cart::total()}}</td>
                    </tr>
                    <tr>
                      <td colspan="5" class="text-right border-right">
                        <button type="submit" class="btn btn-primary btn-sm">Checkout</button>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </form>
            </div>
          </div>
        </div>





        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="card m-0">
            <div class="card-body">
              <table id="highlightRowColumn" class="table custom-table">
                <thead>
                  <tr>
                    <th data-orderable="false">Medicine</th>
                    <th data-orderable="false">Price/Stock</th>
                    <th data-orderable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($allMedicine as $key =>$value)
                    <tr>
                      <td>{{$value->title}}</td>
                      <td>${{$value->unit_price}}
                        &nbsp /&nbsp
                        <span class="badge badge-primary"> {{$value->stock}}</span>
                      </td>
                      <td>
                        @if ($value->stock==0)
                          <span class="badge badge-danger">Out Of Stock</span>
                        @else
                          <input  class="quantity" type="hidden" min="1" value="1" name="qty" style="width:40px;">
                          <button type="button" class="btn btn-primary btn-sm addcart crtbtn" value="{{$value->id}}" data-id='{{$value->id}}'><i class="icon-archive1"></i></button>
                        </td>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade customModalTwoAdvice" id="customModalTwoAdvice" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="{{route("backend.customer.store")}}">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="customModalTwoLabel">New Customer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="inputSubject" class="col-form-label">Name</label>
                <input type="text" name="name" id="new_advice" class="form-control" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label for="inputSubject" class="col-form-label">Email</label>
                <input type="text" name="email" id="new_advice" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <label for="inputSubject" class="col-form-label">Phone</label>
                <input type="text" name="phone" id="new_advice" class="form-control" placeholder="Enter Phone">
              </div>
              <div class="form-group">
                <label for="inputSubject" class="col-form-label">Address</label>
                <input type="text" name="address" id="new_advice" class="form-control" placeholder="Enter Address">
              </div>
            </div>
            <div class="modal-footer custom">
              <div class="left-side">
                <button type="button" class="btn btn-link danger btn-sm" data-dismiss="modal">Cancel</button>
              </div>
              <div class="divider"></div>
              <div class="right-side">
                <button type="submit" class="btn btn-link success btn-sm">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  @endsection
