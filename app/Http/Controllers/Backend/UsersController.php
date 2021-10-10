<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Admins;
use App\Models\Payment;
use App\Models\Charges;
use App\Models\Speciality;
use App\Models\WardBed;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use File;
use Image;
use Arr;
class UsersController extends Controller {

  public function index() {
    $data['title'] = 'Patients';
    $data['allUsers'] = Users::where('type', '2')->get();
    $data['allDoctor'] = Doctor::All();
    // #########Count Patient Section
    $Days7 = Carbon::today()->subDays(7);
    $Days30 = Carbon::today()->subDays(30);
    $data['todaysPatient'] = Users::whereDate('created_at', Carbon::today())->where('type', '2')->count();
    $data['last7DaysPatient'] = Users::whereDate('created_at', '>=', $Days7)->where('type', '2')->count();
    $data['last30DaysPatient'] = Users::whereDate('created_at', '>=', $Days30)->where('type', '2')->count();
    $data['pendingPatient'] = Users::where('status', 0)->where('type', '2')->count();
    $data['approvedPatient'] = Users::where('status', 1)->where('type', '2')->count();

    return view("backend.pages.users.index")->with($data);
  }
  public function admitted_patient() {
    $data['title'] = 'Admitted Patients';
    $data['allUsers'] = Users::whereNull('discharge')->where('type', '2')->get();
    //dd($data['allUsers']);
    return view("backend.pages.users.admitted")->with($data);
  }
  public function discharged_patient() {
    $data['title'] = 'Discharged Patients';
    $data['allUsers'] = Users::whereNotNull('discharge')->where('type', '2')->get();
    return view("backend.pages.users.discharged")->with($data);
  }
  public function create(Request $request) {
    $data['title'] = 'Users';
    $data['allWardBed'] = WardBed::All();
    return view("backend.pages.users.create")->with($data);
  }

  public function newAppointment(Request $request) {
    $Appointment = new Appointment();
    $Appointment->patient_id = $request->id;
    $Appointment->speciality_id = $request->speciality_id;
    $Appointment->checkup_date = $request->checkup_date;
    $Appointment->doctor_id = $request->doctor_id;
    $Appointment->amount = $request->amount;
    $Appointment->payment_id = $request->payment_id;
    $Appointment->remarks = $request->remarks;
    $Appointment->status = $request->app_status;

    $Appointment->save();
    //dd($Appointment);
    if ($Appointment) {
      return redirect()->back()->with("msg", "Appointment Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }
  public function add_balance(Request $request) {
    $Payment = new Payment;
    $Payment->user_id =  $request->id;
    $Payment->type = $request->type;
    $Payment->amount = $request->amount;
    $Payment->remarks = $request->remarks;
     $Payment->date = date("Y-m-d");
    $Payment->save();
    //dd($Appointment);
    if ($Payment) {
      return redirect()->back()->with("msg", "Balance Added Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }
  public function add_charges(Request $request) {
    $Charges = new Charges;
    $Charges->user_id =  $request->id;
    $Charges->amount = $request->amount;
    $Charges->details = $request->details;
      $Charges->date = date("Y-m-d");
    $Charges->save();
    //dd($Appointment);
    if ($Charges) {
      return redirect()->back()->with("msg", "Charges Added Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }

  public function store(UsersRequest $request) {
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext = "";
    }
    $Users = new Users;
    $Users->name = $request->name;
    $Users->email = $request->email;
    $Users->password = bcrypt(123456);
    $Users->phone = $request->phone;
    $Users->gender_id = $request->gender_id;
    $Users->age = $request->age;
    $Users->religion = $request->religion;
    $Users->maritial_status = $request->maritial_status;
    $Users->nid = $request->nid;
    $Users->medical_history = $request->medical_history;
    $Users->relation = $request->relation;
    $Users->guarantor_name = $request->guarantor_name;
    $Users->guarantor_phone = $request->guarantor_phone;
    $Users->guarantor_address = $request->guarantor_address;
    $Users->emergency_name = $request->emergency_name;
    $Users->emergency_phone = $request->emergency_phone;
    $Users->emergency_address = $request->emergency_address;
    $Users->ward_id = $request->ward_id;
    $Users->status = 1;
    $Users->type = 2;
    $Users->image = $ext;
     $Users->date = date("Y-m-d");
    //dd($Users);
    $Users->save();

    $Payment = new Payment;
    $Payment->user_id = $Users->id;
    $Payment->type = $request->type;
    $Payment->amount = $request->amount;
    $Payment->remarks = $request->remarks;
      $Payment->date = date("Y-m-d");
    $Payment->save();

    if ($photo) {
      Image::make($photo)->resize(200, 200)->save("assets/images/users/" . $Users->id . '.' . $ext);
    }
    if ($Users) {
      return redirect()->route('backend.users.create')->with("msg", "Save Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }
  public function view(Request $request, $id) {
    $data['title'] = 'Users';
    $data['selected'] = Users::find($id);
    $data['allSetting'] = Setting::all();
    $data['allSpeciality'] = Speciality::select('*')->get();
    $data['allPayment'] = Payment::where('user_id', $id)->orderBy('id','desc')->get();
    $data['allCharges'] = Charges::where('user_id', $id)->orderBy('id','desc')->get();

    if ($data['selected']['discharge']=="") {
      $data['sumPayment'] = Payment::where('user_id', $id)->where('status', 1)->sum('amount');
      $data['sumCharges'] = Charges::where('user_id', $id)->where('status', 1)->sum('amount');
    }
    else {
      $data['sumPayment'] = Payment::where('user_id', $id)->where('status', 0)->sum('amount');
      $data['sumCharges'] = Charges::where('user_id', $id)->where('status', 0)->sum('amount');
    }



    $wardId=$data['selected']['ward_id'];
    $wardCharge=WardBed::where('id', $wardId)->get('charge');
    $wardCharges=$wardCharge->toArray();
    $data['wardBedCharges']=Arr::flatten($wardCharges);

    $data['to']=Carbon::today();
    $data['from']=$data['selected']['date'];
    $data['d']=date("Y-m-d");
    if ($data['from']==$data['d']) {
      $data['days'] = 1;
    }else {
      $data['days'] = $data['to']->diffInDays($data['from']);
    }


    //dd($data['days'],$data['to'],$from,$d);


    $data['allDoctor'] = Doctor::All();
    $data['allAppointmentDate'] = Appointment::where('patient_id', $id)->orderBy('checkup_date', 'desc')->get();
    //Prescription
    // #########Count Appointment Section
    $data['pendingAppointment'] = Appointment::select('patient_id')->where('status', 0)->where('patient_id', $id)->count();
    $data['cancledAppointment'] = Appointment::select('patient_id')->where('status', 1)->where('patient_id', $id)->count();
    $data['approvedAppointment'] = Appointment::select('patient_id')->where('status', 2)->where('patient_id', $id)->count();
    $data['lastAppoinyment'] = Appointment::select('patient_id', 'checkup_date')->where('status', 2)->where('patient_id', $id)->orderBy('id', 'DESC')->first();
    //dd($data['pendingAppointment'],$data['cancledAppointment'],$data['approvedAppointment']);
    //  dd($data['lastAppoinyment']);
    return view("backend.pages.users.show")->with($data);
  }

  public function update(UsersUpdateRequest $request) {

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
      "password" => bcrypt($request->input("password")),
      "phone" => $request->input("phone"),
      "gender_id" => $request->input("gender_id"),
      "age" => $request->input("age"),
      "religion" => $request->input("religion"),
      "maritial_status" => $request->input("maritial_status"),
      "nid" => $request->input("nid"),
      "medical_history" => $request->input("medical_history"),
      "relation" => $request->input("relation"),
      "guarantor_name" => $request->input("guarantor_name"),
      "guarantor_phone" => $request->input("guarantor_phone"),
      "guarantor_address" => $request->input("guarantor_address"),
      "emergency_name" => $request->input("emergency_name"),
      "emergency_phone" => $request->input("emergency_phone"),
      "emergency_address" => $request->input("emergency_address"),
      'image' => $ext,
    ];
    //dd($arr);
    if (Users::where('id', $id)->update($arr)) {
      $path1 = ("assets/images/users/" . $id . '.' . $ext);
      $move_path1 = ("assets/images/users/" . $id . '.' . $ext);
      if ($photo) {
        if (is_file($path1)) {
          unlink($path1);
        }
        Image::make($photo)->resize(200, 200)->save("assets/images/users/" . $id . '.' . $ext);
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
    $arr = [
      "discharge" => date("Y-m-d"),
    ];
    $arr2 = [
      "status" => 0,
    ];
    if (Users::where('id', $id)->update($arr)){
      Payment::where('user_id', $id)->update($arr2);
      Charges::where('user_id', $id)->update($arr2);
      return redirect()->back()->with("msg", "Patient Discharge Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }


}
