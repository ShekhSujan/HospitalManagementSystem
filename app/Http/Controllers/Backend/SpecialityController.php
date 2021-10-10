<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller {

    public function create() {
        $data['title'] = "Speciality Create";
        $data['allSpeciality'] = Speciality::All()->sortByDesc('desc');
        return view('backend.pages.speciality.create')->with($data);
    }

    public function store(Request $request) {
        $arr = [
            'title' => $request->input('title'),
            'status' => 1
        ];
        if (Speciality::create($arr)) {
            return redirect()->route('backend.speciality.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function edit($id) {
        $data['title'] = "Speciality Edit";
        $data['allSpeciality'] = Speciality::All();
        $data['selected'] = Speciality::find($id);
        return view('backend.pages.speciality.edit')->with($data);
    }

    public function update(Request $request, Speciality $speciality) {
        $id = $request->input("id");
        $arr = [
            'title' => $request->input('title'),
            "status" => $request->input("status"),
        ];
        if (Speciality::where('id', $id)->update($arr)) {
            return redirect()->route('backend.speciality.create')->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function speciality_status_update(Request $request) {
        $id = $request->input("id");
        $status = $request->input("status");
        if ($status == 1) {
            $arr = ["status" => 0];
        } else {
            $arr = ["status" => 1];
        }
        $speciality = Speciality::where('id', $id)->update($arr);
        if ($speciality) {
            return response()->json(['success' => $speciality, 'message' => 'Status Updated successfull']);
        } else {
            return response()->json(['message' => 'Some Error Occurs']);
        }
    }

    public function destroy(Request $request) {
        $id = $request->input("id");
        if (Speciality::where("id", $id)->delete()) {
            return redirect()->route('backend.speciality.create')->with("msg", "Delete Successfully");
        }
        return redirect()->route('backend.speciality.create')->with("error", "Some Error Occurs");
    }

    public function bulk_destroy(Request $request) {
        $id = $request->input("chk");
        // dd($id);
        if ($id) {
            if (Speciality::whereIn("id", $id)->delete()) {
                return redirect()->route('backend.speciality.create')->with("msg", "Delete Successfully");
            }
            return redirect()->route('backend.speciality.create')->with("error", "Some Error Occurs");
        }
        return redirect()->route('backend.speciality.create')->with("error", "Select Some Item First");
    }

}
