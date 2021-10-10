<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Requests\DesignationRequest;
use App\Imports\DesignationImport;
use Maatwebsite\Excel\Facades\Excel;

class DesignationController extends Controller {

    public function create() {
        $data['title'] = "Designation Create";
        $data['allDesignation'] = Designation::All()->sortByDesc('desc');
        return view('backend.pages.designation.create')->with($data);
    }

    public function store(Request $request) {
        $arr = [
            'title' => $request->input('title'),
            'status' => 1
        ];
        if (Designation::create($arr)) {
            return redirect()->route('backend.designation.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function excel_store(Request $request) {
        $file = Excel::import(new DesignationImport, request()->file('file'));
        if ($file) {
            return redirect()->route('backend.designation.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function edit($id) {
        $data['title'] = "Designation Edit";
        $data['allDesignation'] = Designation::All();
        $data['selected'] = Designation::find($id);
        return view('backend.pages.designation.edit')->with($data);
    }

    public function update(Request $request, Designation $designation) {
        $id = $request->input("id");
        $arr = [
            'title' => $request->input('title'),
        ];
        if (Designation::where('id', $id)->update($arr)) {
            return redirect()->route('backend.designation.create')->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function designation_status_update(Request $request) {
        $id = $request->input("id");
        $status = $request->input("status");
        if ($status == 1) {
            $arr = ["status" => 0];
        } else {
            $arr = ["status" => 1];
        }
        $designation = Designation::where('id', $id)->update($arr);
        if ($designation) {
            return response()->json(['success' => $designation, 'message' => 'Status Updated successfull']);
        } else {
            return response()->json(['message' => 'Some Error Occurs']);
        }
    }

    public function destroy(Request $request) {
        $id = $request->input("id");
        if (Designation::where("id", $id)->delete()) {
            return redirect()->route('backend.designation.create')->with("msg", "Delete Successfully");
        }
        return redirect()->route('backend.designation.create')->with("error", "Some Error Occurs");
    }

    public function bulk_destroy(Request $request) {
        $id = $request->input("chk");
        // dd($id);
        if ($id) {
            if (Designation::whereIn("id", $id)->delete()) {
                return redirect()->route('backend.designation.create')->with("msg", "Delete Successfully");
            }
            return redirect()->route('backend.designation.create')->with("error", "Some Error Occurs");
        }
        return redirect()->route('backend.designation.create')->with("error", "Select Some Item First");
    }

}
