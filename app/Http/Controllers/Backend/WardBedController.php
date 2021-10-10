<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WardBed;
use Illuminate\Http\Request;
class WardBedController extends Controller {

  public function create() {
    $data['title'] = "WardBed Create";
    $data['allWardBed'] = WardBed::All()->sortByDesc('desc');
    return view('backend.pages.ward-bed.create')->with($data);
  }

  public function store(Request $request) {
    $arr = [
      'title' => $request->input('title'),
      'bed' => $request->input('bed'),
      'charge' => $request->input('charge'),
    ];
    if (WardBed::create($arr)) {
      return redirect()->route('backend.ward-bed.create')->with("msg", "Save Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }

  public function edit($id) {
    $data['title'] = "WardBed Edit";
    $data['allWardBed'] = WardBed::All();
    $data['selected'] = WardBed::find($id);
    return view('backend.pages.ward-bed.edit')->with($data);
  }

  public function update(Request $request, WardBed $WardBed) {
    $id = $request->input("id");
    $arr = [
      'title' => $request->input('title'),
      'bed' => $request->input('bed'),
      'charge' => $request->input('charge'),
    ];
    if (WardBed::where('id', $id)->update($arr)) {
      return redirect()->route('backend.ward-bed.create')->with("msg", "Update Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }

  public function destroy(Request $request) {
    $id = $request->input("id");
    if (WardBed::where("id", $id)->delete()) {
      return redirect()->route('backend.ward-bed.create')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.ward-bed.create')->with("error", "Some Error Occurs");
  }

  public function bulk_destroy(Request $request) {
    $id = $request->input("chk");
    // dd($id);
    if ($id) {
      if (WardBed::whereIn("id", $id)->delete()) {
        return redirect()->route('backend.ward-bed.create')->with("msg", "Delete Successfully");
      }
      return redirect()->route('backend.ward-bed.create')->with("error", "Some Error Occurs");
    }
    return redirect()->route('backend.ward-bed.create')->with("error", "Select Some Item First");
  }

}
