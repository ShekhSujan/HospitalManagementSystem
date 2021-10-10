<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Requests\AdminsRequest;
use Illuminate\Support\Facades\Hash;
use File;
use Image;

class AdminsController extends Controller {

    public function index() {
        $data['title'] = "Admins Create";
        $data['allAdmins'] = Admins::where('role', 1)->orWhere('role', 3)->orderBy('id', 'desc')->get();
        //dd($data['allAdmins']);
        return view('backend.pages.admins.index')->with($data);
    }

    public function create() {
        $data['title'] = "Admins Create";
        $data['allAdmins'] = Admins::All()->sortByDesc('desc');
        return view('backend.pages.admins.create')->with($data);
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
        $arr->role = $request->role;
        $arr->address = $request->address;
        $arr->p_insert = $request->p_insert;
        $arr->p_update = $request->p_update;
        $arr->p_delete = $request->p_delete;
        $arr->p_approve = $request->p_approve;
        $arr->image = $ext;
        $arr->status = 1;
        $arr->save();

        if ($request->input('role') == 2) {
            $doctor = new Doctor();
            $doctor->user_id = $arr->id;
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->save();
        }
        if ($photo) {
            Image::make($photo)->resize(200, 200)->save("assets/images/admins/" . $arr->id . '.' . $ext, 70);
            return redirect()->route('backend.admins.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function edit($id) {
        $data['title'] = "Admins Edit";
        $data['allAdmins'] = Admins::All();
        $data['selected'] = Admins::find($id);
        return view('backend.pages.admins.edit')->with($data);
    }

    public function view(Request $request, $id) {
        $data['title'] = "Admins View";
        $data['selected'] = Admins::find($id);
        return view("backend.pages.admins.show")->with($data);
    }

    public function update(Request $request) {
        $id = $request->input("id");
        $photo = $request->file("pic");
        if ($photo) {
            $ext = strtolower($photo->getClientOriginalExtension());
        } else {
            $ext = $request->input("ext");
        }
        $arr = [
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password")),
            "role" => $request->input("role"),
            "phone" => $request->input("phone"),
            "address" => $request->input("address"),
            "p_insert" => $request->input("p_insert"),
            "p_update" => $request->input("p_update"),
            "p_delete" => $request->input("p_delete"),
            "p_approve" => $request->input("p_approve"),
            'image' => $ext,
            "status" => $request->input("status"),
        ];
        //  dd($arr);
        if (Admins::where('id', $id)->update($arr)) {
            $path = ("assets/images/admins/" . $id . '.' . $ext);
            $move_path = ("assets/images/admins/" . $id . '.' . $ext);
            //ddd($req_slug,$path,$move_path,$photo);
            if ($photo) {
                if (is_file($path)) {
                    unlink($path);
                }
                Image::make($photo)->resize(348, 186)->save("assets/images/admins/" . $id . '.' . $ext, 70);
            } else {
                if (is_file($path)) {
                    File::move($path, $move_path);
                }
            }
            return redirect()->back()->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function admins_status_update(Request $request) {
        $id = $request->input("id");
        $status = $request->input("status");
        if ($status == 1) {
            $arr = ["status" => 0];
        } else {
            $arr = ["status" => 1];
        }
        $Admins = Admins::where('id', $id)->update($arr);
        if ($Admins) {
            return response()->json(['success' => $Admins, 'message' => 'Status Updated successfull']);
        } else {
            return response()->json(['message' => 'Some Error Occurs']);
        }
    }

    public function destroy(Request $request) {
        $id = $request->input("id");
        $slug_Admins = Admins::select('id', 'image')->where('id', '=', $id)->get();
        foreach ($slug_Admins as $value) {
            $ext = $value->image;
        }
        $path = "assets/images/admins/{$id}.{$ext}";
        if (Admins::where("id", $id)->delete()) {
            if (is_file($path)) {
                unlink($path);
            }
            return redirect()->back()->with("msg", "Delete Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }
}
