<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Stock;
use App\Imports\MedicineImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class MedicineController extends Controller {

    public function index() {
        $data['title'] = "Medicine";
        $data['allMedicine'] = Medicine::select('*')->orderBy('id', 'desc')->get();
        return view("backend.pages.medicine.index")->with($data);
    }

    public function create(Request $request) {
        $data['title'] = "Add Medicine";
        return view("backend.pages.medicine.create")->with($data);
    }

    public function store(Request $request) {
        $Today =date("Y-m-d");
      $Medicine = new Medicine;
      $Medicine->title = $request->title;
      $Medicine->unit_price = $request->unit_price;
      $Medicine->stock = $request->stock;
      $Medicine->company = $request->company;
      $Medicine->dosage = $request->dosage;
      $Medicine->strength = $request->strength;
      $Medicine->generic = $request->generic;
      $Medicine->status = 1;
      $Medicine->save();
      $Stock = new Stock();
      $Stock->medicine_id = $Medicine->id;
      $Stock->stock_history = $Today.'='.$request->stock;;
      $Stock->save();
                //dd($arr);
        if ($Medicine) {
            return redirect()->route('backend.medicine.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function excel_store(Request $request) {
        $file = Excel::import(new MedicineImport, request()->file('file'));
        if ($file) {
            return redirect()->route('backend.medicine.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function edit(Request $request, $id) {
        $data['title'] = "Update Medicine";
        $data['selected'] = Medicine::find($id);
        return view("backend.pages.medicine.edit")->with($data);
    }

    public function update(Request $request) {
        $id = $request->input("id");
        $arr = [
          "title" => $request->input("title"),
          "unit_price" => $request->input("unit_price"),
          "company" => $request->input("company"),
          "dosage" => $request->input("dosage"),
          "strength" => $request->input("strength"),
          "generic" => $request->input("generic"),
        ];
        //dd($id);
        if (Medicine::where('id', $id)->update($arr)) {
            return redirect()->route('backend.medicine.index')->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function destroy(Request $request) {
        $id = $request->input("id");
        if (Medicine::where("id", $id)->delete()) {
            return redirect()->route('backend.medicine.index')->with("msg", "Delete Successfully");
        }
        return redirect()->route('backend.medicine.index')->with("error", "Some Error Occurs");
    }

    public function bulk_destroy(Request $request) {
        $id = $request->input("chk");
        // dd($id);
        if ($id) {
            if (Medicine::whereIn("id", $id)->delete()) {
                return redirect()->route('backend.medicine.index')->with("msg", "Delete Successfully");
            }
            return redirect()->route('backend.medicine.index')->with("error", "Some Error Occurs");
        }
        return redirect()->route('backend.medicine.index')->with("error", "Select Some Item First");
    }

}
