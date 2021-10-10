<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use File;
use Image;
use Arr;

class DoctorController extends Controller {

    public function index() {
        $data['title'] = 'Doctor';
        $data['allDoctor'] = Doctor::select('doctors.*', 'speciality.title as speciality_title')
                ->join('speciality', 'speciality.id', '=', 'doctors.speciality_id')
                ->orderBy('id', 'desc')
                ->get();
        return view("backend.pages.doctor.index")->with($data);
    }
    public function doctor_report(Request $request) {
        $data['title'] = 'Doctor Report';
          $data['allSpeciality'] = Speciality::select('*')->orderBy('id', 'desc')->get();
        $speciality=$request->speciality_id;
        if ($speciality) {
        $data['allDoctor'] = Doctor::select('doctors.*', 'speciality.title as speciality_title')
                ->join('speciality', 'speciality.id', '=', 'doctors.speciality_id')
                ->orderBy('id', 'desc')
                ->where('doctors.speciality_id', $speciality)
                ->get();
              }
        return view("backend.pages.doctor.report")->with($data);
    }

    public function create() {
        $data['title'] = "Doctor Create";
        $data['allSpeciality'] = Speciality::select('*')->orderBy('id', 'desc')->get();
        return view('backend.pages.doctor.create')->with($data);
    }

    public function store(Request $request) {
        $photo = $request->file("pic");
        if ($photo) {
            $ext = strtolower($photo->getClientOriginalExtension());
        } else {
            $ext = "";
        }
        $arr = new Admins();
        $arr->name = $request->name;
        $arr->email = $request->email;
        $arr->phone = $request->phone;
        $arr->password = bcrypt($request->password);
        $arr->role = 2;
        $arr->p_insert = $request->p_insert;
        $arr->p_update = $request->p_update;
        $arr->p_delete = $request->p_delete;
        $arr->p_approve = $request->p_approve;
        $arr->status = 1;
        //  dd($arr);
        $arr->save();
        $doctor = new Doctor();
        $doctor->user_id = $arr->id;
        $doctor->name = $request->name;
        $doctor->email = $request->email;

        $doctor->speciality_id = $request->speciality_id;
        $doctor->image = $ext;
        //  dd($doctor);
        $doctor->save();
        if ($arr) {
            Image::make($photo)->resize(200, 200)->save("assets/images/doctor/" . $doctor->id . '.' . $ext, 70);
            return redirect()->back()->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function edit(Request $request, $id) {
        $data['title'] = 'Doctor';
        $data['selected'] = Doctor::find($id);
        $d = Doctor::where('id', $id)->get();
        $dd = "";
        foreach ($d as $value) {
            $dd = $value->user_id;
        }
        $per1 = Admins::select('p_insert', 'p_update', 'p_approve', 'p_delete')->where('id', $dd)->get();
        $per2 = $per1->toArray();
        $data['permission'] = Arr::flatten($per2);
        $data['allSpeciality'] = Speciality::select('*')->orderBy('id', 'desc')->get();
        return view("backend.pages.doctor.edit")->with($data);
    }

    public function update(Request $request) {
        $id = $request->input("id");
        $photo = $request->file("pic");
        $d = Doctor::where('id', $id)->get();
        $dd = "";
        foreach ($d as $value) {
            $dd = $value->user_id;
        }
        if ($photo) {
            $ext = strtolower($photo->getClientOriginalExtension());
        } else {
            $ext = $request->input("ext");
        }
        $arr = [
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "address" => $request->input("address"),
            "organization" => $request->input("organization"),
            "designation" => $request->input("designation"),
            "speciality_id" => $request->input("speciality_id"),
            "status" => $request->input("status"),
            'image' => $ext,
        ];
        $arr2 = [
            "p_insert" => $request->input("p_insert"),
            "p_update" => $request->input("p_update"),
            "p_delete" => $request->input("p_delete"),
            "p_approve" => $request->input("p_approve")
        ];
        // dd($arr2);
        // dd($dd);
        Admins::where('id', $dd)->update($arr2);
        if (Doctor::where('id', $id)->update($arr)) {
            $path1 = ("assets/images/doctor/" . $id . '.' . $ext);
            $move_path1 = ("assets/images/doctor/" . $id . '.' . $ext);
            if ($photo) {
                if (is_file($path1)) {
                    unlink($path1);
                }
                Image::make($photo)->resize(200, 200)->save("assets/images/doctor/" . $id . '.' . $ext);
            } else {
                if (is_file($path1)) {
                    File::move($path1, $move_path1);
                }
            }
            return redirect()->route('backend.doctor.index')->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function doctor_status_update(Request $request) {
        $id = $request->input("id");
        $status = $request->input("status");
        if ($status == 1) {
            $arr = ["status" => 0];
        } else {
            $arr = ["status" => 1];
        }
        $Doctor = Doctor::where('id', $id)->update($arr);
        if ($Doctor) {
            return response()->json([
                        'success' => $Doctor, 'message' => 'Status Updated successfull'
            ]);
        } else {
            return response()->json([
                        'message' => 'Some Error Occurs'
            ]);
        }
    }

    public function destroy(Request $request) {
        $id = $request->input("id");
        //$ext = $request->input("ext");
        $slug_Doctor = Doctor::select('id', 'image')->where('id', '=', $id)->get();
        foreach ($slug_Doctor as $value) {
            $ext = $value->image;
        }
        $path = "assets/images/doctor/" . $id . '.' . $ext;
        if (Doctor::where("id", $id)->delete()) {
            if (is_file($path)) {
                unlink($path);
            }
            return redirect()->route('backend.doctor.index')->with("msg", "Delete Successfully");
        }
        return redirect()->route('backend.doctor.index')->with("error", "Some Error Occurs");
    }

}
