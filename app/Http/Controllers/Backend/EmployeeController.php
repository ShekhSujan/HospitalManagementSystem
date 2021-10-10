<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Education;
use App\Models\Department;
use App\Models\Designation;
use App\Imports\EmployeeImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use File;
use Image;
use DB;

class EmployeeController extends Controller {

  public function index() {
    $data['title'] = 'Employee';
    $data['allEmployee'] = Employee::select('*')->orderBy('id', 'desc')->get();
    return view("backend.pages.employee.index")->with($data);
  }

  public function create(Request $request) {
    $data['title'] = 'Employee';
    $data['allEducation']=Education::select('*')->orderBy('id', 'desc')->get();
    $data['allDepartment']=Department::select('*')->orderBy('id', 'desc')->get();
    $data['allDesignation']=Designation::select('*')->orderBy('id', 'desc')->get();
    return view("backend.pages.employee.create")->with($data);
  }

  public function store(Request $request) {
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext = "";
    }
    $arr = [
      "name" => $request->input("name"),
      "email" => $request->input("email"),
      "slug" => strtolower(preg_replace('/\s+/u', '-', trim($request->input("name")))),
      "phone" => $request->input("phone"),
      "nid" => $request->input("nid"),
      "dob" => $request->input("dob"),
      "gender" => $request->input("gender"),
      "religion" => $request->input("religion"),
      "address" => $request->input("address"),
      "last_education" => $request->input("last_education"),
      "result" => $request->input("result"),
      "maritial_status" => $request->input("maritial_status"),
      "joining_date" => $request->input("joining_date"),
      "department" => $request->input("department"),
      "designation" => $request->input("designation"),
      "salary" => $request->input("salary"),
      "increment_details" => $request->input("increment_details"),
      "emergency_name" => $request->input("emergency_name"),
      "emergency_phone" => $request->input("emergency_phone"),
      "emergency_address" => $request->input("emergency_address"),
      "bank_name" => $request->input("bank_name"),
      "bank_number" => $request->input("bank_number"),
      "bank_branch" => $request->input("bank_branch"),
      'image' => $ext,
      'status' => 1,
    ];
    // dd($arr);
    $id = Employee::insertGetId($arr);
    $slug = strtolower(preg_replace('/\s+/u', '-', trim($request->input("name"))));
    if ($id && $photo) {
      Image::make($photo)->resize(200, 200)->save("assets/images/employee/" . $id . '-' . $slug . '.' . $ext);
      return redirect()->route('backend.employee.create')->with("msg", "Save Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }
  public function report(Request $request) {
    $data['title'] = "Employee Report";
    $data['allDepartment']=Department::select('*')->orderBy('id', 'desc')->get();
    $data['allDesignation']=Designation::select('*')->orderBy('id', 'desc')->get();
    return view("backend.pages.employee.report")->with($data);
  }
  public function report_view(Request $request) {
    $data['title'] = "Employee Report View";
    $data['allDepartment']=Department::select('*')->orderBy('id', 'desc')->get();
    $data['allDesignation']=Designation::select('*')->orderBy('id', 'desc')->get();
      $sql = DB::table("employee");
    if ($request->get("department")) {
      $sql = $sql->where("department", $request->get("department"));
    }
    if ($request->get("designation")) {
      $sql = $sql->where("designation", $request->get("designation"));
    }
      $data['allEmployee'] =$sql->get();
    return view("backend.pages.employee.report-view")->with($data);
  }
  public function excel_store(Request $request) {
    $file = Excel::import(new EmployeeImport, request()->file('file'));
    if ($file) {
      return redirect()->route('backend.employee.create')->with("msg", "Save Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }

  public function view(Request $request, $id) {
    $data['title'] = 'Employee';
    $data['selected'] = Employee::find($id);
    $data['allEducation']=Education::select('*')->orderBy('id', 'desc')->get();
    $data['allDepartment']=Department::select('*')->orderBy('id', 'desc')->get();
    $data['allDesignation']=Designation::select('*')->orderBy('id', 'desc')->get();
    return view("backend.pages.employee.show")->with($data);
  }

  public function edit(Request $request, $id) {
    $data['title'] = 'Employee';
    $data['selected'] = Employee::find($id);
    $data['allEducation']=Education::select('*')->orderBy('id', 'desc')->get();
    $data['allDepartment']=Department::select('*')->orderBy('id', 'desc')->get();
    $data['allDesignation']=Designation::select('*')->orderBy('id', 'desc')->get();
    //dd($data['allDepartment']);
    return view("backend.pages.employee.edit")->with($data);
  }

  public function update(Request $request) {
    $id = $request->input("id");
    $slug_Employee = Employee::select('id', 'slug')->where('id', '=', $id)->get();
    foreach ($slug_Employee as $value) {
      $slug = $value->slug;
      //  echo $slug;
    }
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext = $request->input("ext");
    }
    $arr = [
      "name" => $request->input("name"),
      "email" => $request->input("email"),
      "slug" => strtolower(preg_replace('/\s+/u', '-', trim($request->input("name")))),
      "phone" => $request->input("phone"),
      "nid" => $request->input("nid"),
      "dob" => $request->input("dob"),
      "gender" => $request->input("gender"),
      "religion" => $request->input("religion"),
      "address" => $request->input("address"),
      "last_education" => $request->input("last_education"),
      "result" => $request->input("result"),
      "maritial_status" => $request->input("maritial_status"),
      "joining_date" => $request->input("joining_date"),
      "department" => $request->input("department"),
      "designation" => $request->input("designation"),
      "salary" => $request->input("salary"),
      "increment_details" => $request->input("increment_details"),
      "emergency_name" => $request->input("emergency_name"),
      "emergency_phone" => $request->input("emergency_phone"),
      "emergency_address" => $request->input("emergency_address"),
      "bank_name" => $request->input("bank_name"),
      "bank_number" => $request->input("bank_number"),
      "bank_branch" => $request->input("bank_branch"),
      'image' => $ext,
      'status' => $request->input("status")
    ];
    //  dd($arr);
    if (Employee::where('id', $id)->update($arr)) {
      $req_slug = strtolower(preg_replace('/\s+/u', '-', trim($request->input("name"))));
      $path1 = ("assets/images/employee/" . $id . '-' . $slug . '.' . $ext);
      $move_path1 = ("assets/images/employee/" . $id . '-' . $req_slug . '.' . $ext);
      //ddd($slug,$req_slug,$path1,$path2,$ext);
      if ($photo) {
        if (is_file($path1)) {
          unlink($path1);
        }
        Image::make($photo)->resize(200, 200)->save("assets/images/employee/" . $id . '-' . $req_slug . '.' . $ext);
      } else {
        if (is_file($path1)) {
          File::move($path1, $move_path1);
        }
      }
      return redirect()->back()->with("msg", "Update Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }

  public function destroy(Request $request) {
    $id = $request->input("id");
    //$ext = $request->input("ext");
    $slug_eve = Employee::select('id', 'slug', 'image')->where('id', '=', $id)->get();
    foreach ($slug_eve as $value) {
      $slug = $value->slug;
      $ext = $value->image;
      //  echo $slug;
    }
    $path = "assets/images/employee/" . $id . '-' . $slug . '.' . $ext;
    if (Employee::where("id", $id)->delete()) {
      if (is_file($path)) {
        unlink($path);
      }
      return redirect()->route('backend.employee.index')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.employee.index')->with("error", "Some Error Occurs");
  }

  public function bulk_destroy(Request $request) {
    $ids = $request->input("chk");
    if ($ids) {
      foreach ($ids as $id) {
        $slug_Employee = Employee::select('id', 'slug', 'image')->where('id', '=', $id)->get();
        foreach ($slug_Employee as $value) {
          $slug = $value->slug;
          $ext = $value->image;
          //  echo $slug;
        }
        $path = "assets/images/employee/" . $id . '-' . $slug . '.' . $ext;
        if (is_file($path)) {
          unlink($path);
        }
      }
      Employee::whereIn("id", $ids)->delete();
      return redirect()->route('backend.employee.index')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.employee.index')->with("error", "Select Some Item First");
  }

}
