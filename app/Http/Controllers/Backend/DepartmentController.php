<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Imports\DepartmentImport;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller {

    public function create() {
        $data['title'] = "Department Create";
        $data['allDepartment'] = Department::All()->sortByDesc('desc');
        return view('backend.pages.department.create')->with($data);
    }

    public function store(Request $request) {
        $arr = [
            'title' => $request->input('title'),
            'status' => 1
        ];
        if (Department::create($arr)) {
            return redirect()->route('backend.department.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function excel_store(Request $request) {
        $file = Excel::import(new DepartmentImport, request()->file('file'));
        if ($file) {
            return redirect()->route('backend.department.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }
    public function department_status_update(Request $request) {
        $id = $request->input("id");
        $status = $request->input("status");
        if ($status == 1) {
            $arr = ["status" => 0];
        } else {
            $arr = ["status" => 1];
        }
        $designation = Department::where('id', $id)->update($arr);
        if ($designation) {
            return response()->json(['success' => $designation, 'message' => 'Status Updated successfull']);
        } else {
            return response()->json(['message' => 'Some Error Occurs']);
        }
    }
    public function edit($id) {
        $data['title'] = "Department Edit";
        $data['allDepartment'] = Department::All();
        $data['selected'] = Department::find($id);
        return view('backend.pages.department.edit')->with($data);
    }

    public function update(Request $request, Department $Department) {
        $id = $request->input("id");
        $arr = [
            'title' => $request->input('title'),
            "status" => $request->input("status"),
        ];
        if (Department::where('id', $id)->update($arr)) {
            return redirect()->route('backend.department.create')->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function destroy(Request $request) {
        $id = $request->input("id");
        if (Department::where("id", $id)->delete()) {
            return redirect()->route('backend.department.create')->with("msg", "Delete Successfully");
        }
        return redirect()->route('backend.department.create')->with("error", "Some Error Occurs");
    }

    public function bulk_destroy(Request $request) {
        $id = $request->input("chk");
        // dd($id);
        if ($id) {
            if (Department::whereIn("id", $id)->delete()) {
                return redirect()->route('backend.department.create')->with("msg", "Delete Successfully");
            }
            return redirect()->route('backend.department.create')->with("error", "Some Error Occurs");
        }
        return redirect()->route('backend.department.create')->with("error", "Select Some Item First");
    }

}
