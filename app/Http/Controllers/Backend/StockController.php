<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Carbon\Carbon;
class StockController extends Controller {

    public function create(Request $request) {
        $data['allMedicine'] = Medicine::all();
        return view("backend.pages.stock.create")->with($data);
    }
    public function update(Request $request) {
      $id = $request->input("id");
      //stock Table
      $st=Stock::where('medicine_id', $id)->get();
      $old_stock="";
      foreach ($st as $value) {
        $old_stock=$value->stock_history;
      }
      $Today =date("Y-m-d");
      $stock=$request->input("stock");
      $stock_history=$old_stock.','.$Today.'='.$stock;
      $arr = [
        "medicine_id" => $request->input("id"),
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
        $update_stk=$medi_stock+$request->input("stock");
        $arr_medi = [
          "stock" => $update_stk
        ];
        //dd($arr_medi);
        if (Stock::where('medicine_id', $id)->update($arr)) {
            Medicine::where('id', $id)->update($arr_medi);
            return redirect()->back()->with("msg", "Stock Updated Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }
    public function view(Request $request, $id) {
        $data['title'] = 'Stock View';
        $data['selected'] = Medicine::find($id);
        $data['allStock'] = Stock::select('*')->where('medicine_id', $id)->get();
        //dd($data['allStock']);
        $history="";
        foreach ($data['allStock'] as $value) {
          $history=$value->stock_history;
        }
        $data['stock_history']=explode(",",$history);
        return view("backend.pages.stock.show")->with($data);
    }
}
