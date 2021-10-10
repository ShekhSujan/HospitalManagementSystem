<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Imports\EducationImport;
use Maatwebsite\Excel\Facades\Excel;

class EducationController extends Controller {

    public function create() {
        $data['title'] = "Education Create";
        $data['allEducation'] = Education::All()->sortByDesc('desc');
        return view('backend.pages.education.create')->with($data);
    }

    public function store(Request $request) {
        $arr = [
            'title' => $request->input('title'),
            'status' => 1
        ];
        if (Education::create($arr)) {
            return redirect()->route('backend.education.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function excel_store(Request $request) {
        $file = Excel::import(new EducationImport, request()->file('file'));
        if ($file) {
            return redirect()->route('backend.education.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function edit($id) {
        $data['title'] = "Education Edit";
        $data['allEducation'] = Education::All();
        $data['selected'] = Education::find($id);
        return view('backend.pages.education.edit')->with($data);
    }
    public function education_status_update(Request $request) {
        $id = $request->input("id");
        $status = $request->input("status");
        if ($status == 1) {
            $arr = ["status" => 0];
        } else {
            $arr = ["status" => 1];
        }
        $designation = Education::where('id', $id)->update($arr);
        if ($designation) {
            return response()->json(['success' => $designation, 'message' => 'Status Updated successfull']);
        } else {
            return response()->json(['message' => 'Some Error Occurs']);
        }
    }
    public function update(Request $request, Education $Education) {
        $id = $request->input("id");
        $arr = [
            'title' => $request->input('title'),
        ];
        if (Education::where('id', $id)->update($arr)) {
            return redirect()->route('backend.education.create')->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function destroy(Request $request) {
        $id = $request->input("id");
        if (Education::where("id", $id)->delete()) {
            return redirect()->route('backend.education.create')->with("msg", "Delete Successfully");
        }
        return redirect()->route('backend.education.create')->with("error", "Some Error Occurs");
    }

    public function bulk_destroy(Request $request) {
        $id = $request->input("chk");
        // dd($id);
        if ($id) {
            if (Education::whereIn("id", $id)->delete()) {
                return redirect()->route('backend.education.create')->with("msg", "Delete Successfully");
            }
            return redirect()->route('backend.education.create')->with("error", "Some Error Occurs");
        }
        return redirect()->route('backend.education.create')->with("error", "Select Some Item First");
    }

}
