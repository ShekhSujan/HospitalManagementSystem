<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Customer;
use App\Models\MedicineOrders;
use App\Models\OrderDetails;
use App\Models\Stock;
use App\Models\Setting;
use Illuminate\Http\Request;
use Cart;
class PosController extends Controller {

  public function index(Request $request) {
      $data['allInvoice'] = MedicineOrders::select('medicine_orders.*','customer.name','customer.email','customer.phone')
      ->join('customer','customer.id','medicine_orders.customer_id')
      ->orderBy('id', 'desc')
      ->get();
      //dd($data['allInvoice']);
      return view('backend.pages.pos.index')->with($data);
  }
  public function create(Request $request) {
    $data['title'] = "Pos";
      $data['selected'] = MedicineOrders::latest()->first();
    $data['allMedicine'] = Medicine::select('*')->orderBy('id', 'desc')->get();
    $data['allCart']=Cart::content();
    $data['allCustomer']=Customer::all();
    return view("backend.pages.pos.create")->with($data);
  }
  public function report(Request $request) {
    $data['title'] = "Pos";
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    //dd($start_date,$end_date);
    $data['allInvoice'] = MedicineOrders::select('medicine_orders.*','customer.name','customer.email','customer.phone')
    ->join('customer','customer.id','medicine_orders.customer_id')
    ->orderBy('id', 'desc')
    ->whereBetween("medicine_orders.date", [$start_date, $end_date])
    ->get();
    //dd($data['allInvoice']);
    return view("backend.pages.pos.report")->with($data);
  }
  public function store(Request $request)
  {
    $data=Cart::content();
    $arr = new MedicineOrders();
    $arr->customer_id = $request->customer_id;
    $arr->total = Cart::total();
    $arr->tax = Cart::tax();
    $arr->subtotal = Cart::subtotal();
        $arr->date = date("Y-m-d");;
    $arr->save();

    $orderId=$arr->id;
    foreach ($data as $key => $value) {
      $arr2 = new OrderDetails();
      $arr2->order_id = $orderId;
      $arr2->medicine_id = $value->id;
      $arr2->qty = $value->qty;
      $arr2->price = $value->price;
      $arr2->total = $value->qty*$value->price;
      $arr2->save();

      $id=$value->id;
      $qty=$value->qty;

      $st=Stock::where('medicine_id', $id)->get();
      $old_stock="";
      foreach ($st as $value) {
        $old_stock=$value->stock_history;
      }
      $Today =date("Y-m-d");
      $stock=$qty;
      $stock_history=$old_stock.','.$Today.'='.$stock;
      $arr = [
        "medicine_id" => $id,
        "stock_history" => $stock_history,
      ];
      //stock Table
      //medicine table
      $med=Medicine::where('id', $id)->get();
      $medi_stock="";
      foreach ($med as $value) {
        $medi_stock=$value->stock;
      }
      //dd($medi_stock);
      $update_stk=$medi_stock-$qty;
      $arr_medi = [
        "stock" => $update_stk
      ];
      Stock::where('medicine_id', $id)->update($arr);
      Medicine::where('id', $id)->update($arr_medi);
      Cart::destroy();
    }
    return redirect()->back()->with("msg", "Save Successfully");
  }
  public function view(Request $request, $id) {
      $data['title'] = 'Invoice View';
      $data['selected'] = MedicineOrders::find($id);
      $data['allOrderDetails'] = OrderDetails::select('order_details.*','medex.title')
      ->join('medex','medex.id','=','order_details.medicine_id')
      ->where('order_id', $id)
      ->get();
      //dd($data['allOrderDetails']);
      $data['allSetting'] = Setting::all();
      $data['allCustomer'] = MedicineOrders::select('medicine_orders.*','customer.name','customer.email','customer.address','customer.phone')
      ->join('customer','customer.id','=','medicine_orders.customer_id')
       ->where('medicine_orders.id', $id)
      ->get();
    //  dd($data['allCustomer']);
      return view("backend.pages.pos.show")->with($data);
  }

  public function destroy(Request $request) {
      $id = $request->input("id");
      if (MedicineOrders::where("id", $id)->delete()) {
        OrderDetails::where("order_id", $id)->delete();
          return redirect()->route('backend.pos.index')->with("msg", "Delete Successfully");
      }
      return redirect()->route('backend.pos.index')->with("error", "Some Error Occurs");
  }

  public function bulk_destroy(Request $request) {
      $id = $request->input("chk");
      // dd($id);
      if ($id) {
          if (MedicineOrders::whereIn("id", $id)->delete()) {
            OrderDetails::whereIn("order_id", $id)->delete();
              return redirect()->route('backend.pos.index')->with("msg", "Delete Successfully");
          }
          return redirect()->route('backend.pos.index')->with("error", "Some Error Occurs");
      }
      return redirect()->route('backend.pos.index')->with("error", "Select Some Item First");
  }
}
