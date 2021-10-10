<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Medicine;
use DB;


class CartController extends Controller
{
  public function addCart($id,Request $request){
  $medicine=DB::table('medex')->where('id',$id)->first();
  $data=array();
  $data['id']=$medicine->id;
  $data['name']=$medicine->title;
  $data['qty']=$request->qty;
  $data['weight']=1;
  $data['price']=$medicine->unit_price;
  Cart::add($data);
  return\Response::json(['success'=>'Successfully Added']);
}
public function updateCart(Request $request){
  $rowId=$request->rowId;
  $qty=$request->qty;
  Cart::update($rowId,$qty);
return\Response::json(['success'=>'Successfully Updated']);
}
public function removeCart($rowId){
  Cart::remove($rowId);
  return\Response::json(['success'=>'Successfully Deleted']);
}
}
