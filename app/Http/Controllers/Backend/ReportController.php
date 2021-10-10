<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Users;
use App\Models\Medicine;
use App\Models\Complain;
use App\Models\WardBed;
use DB;
use Carbon\Carbon;

class ReportController extends Controller {

  public function create_appointment_booking_report(Request $request) {
    $data['title'] = 'Create Appointment Booking Report';
    $data['Appointment'] = appointment_report();
    return view("backend.pages.appointment.appointment-booking.create-booking-report")->with($data);
  }

  public function view_appointment_booking_report(Request $request) {
    $data['title'] = 'Appointment Report';
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $sql = DB::table("appointment");
    if ($start_date && $end_date) {
      $sql = $sql->select('appointment.*', 'users.id as user_id', 'users.name as user_name', 'users.phone as user_phone')
      ->join("users", "users.id", "=", "appointment.patient_id")
      ->orderBy('appointment.id', 'desc')
      ->whereBetween('appointment.date', [$start_date, $end_date]);
    }
    //dd($request->get("status"));
    if ($request->get("status")) {
      $sql = $sql->where("appointment.status", $request->get("status"));
    }
    $result = $sql->get();
    $data['allResult'] = $result;
    $data['Appointment'] = appointment_report();
    return view("backend.pages.appointment.appointment-booking.view-booking-report")->with($data);
  }
  public function create_appointment_payment_report(Request $request) {
    $data['title'] = 'Create Appointment Payment Report';
    $data['Appointment'] = appointment_report();
    return view("backend.pages.appointment.appointment-payment.create-payment-report")->with($data);
  }

  public function view_appointment_payment_report(Request $request) {
    $data['title'] = 'Appointment Payment Report';
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $sql = DB::table("appointment");
    if ($start_date && $end_date) {
      $sql = $sql->select('appointment.*')
      ->orderBy('appointment.id', 'desc')
      ->whereBetween('appointment.date', [$start_date, $end_date]);
    }
    //dd($request->get("status"));
    if ($request->get("payment_id")) {
      $sql = $sql->where("appointment.payment_id", $request->get("payment_id"));
    }
    $result = $sql->get();
    $data['allResult'] = $result;
    $data['Appointment'] = appointment_report();
    return view("backend.pages.appointment.appointment-payment.view-payment-report")->with($data);
  }
  //Checkup Report
  public function create_appointment_checkup_report(Request $request) {
    $data['title'] = 'Create Appointment Report';
    $data['Appointment'] = appointment_report();
    return view("backend.pages.appointment.appointment-checkup.create-checkup-report")->with($data);
  }

  public function view_appointment_checkup_report(Request $request) {
    $data['title'] = 'Appointment Report';
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $sql = DB::table("appointment");
    if ($start_date && $end_date) {
      $sql = $sql->select('appointment.*', 'users.id as user_id', 'users.name as user_name', 'users.phone as user_phone')
      ->join("users", "users.id", "=", "appointment.patient_id")
      ->orderBy('appointment.checkup_date', 'desc')
      ->whereBetween('appointment.date', [$start_date, $end_date]);
    }
    //dd($request->get("status"));
    if ($request->get("status")) {
      $sql = $sql->where("appointment.status", $request->get("status"));
    }
    $result = $sql->get();
    $data['allResult'] = $result;
    $data['Appointment'] = appointment_report();
    return view("backend.pages.appointment.appointment-checkup.view-checkup-report")->with($data);
  }

  //Patient Report
  public function create_patient_report(Request $request) {
    $data['title'] = 'Create Patient Report';
    $data['Patient'] = patient_report();
    $data['allWardBed'] = WardBed::all();

    return view("backend.pages.report.patient.create-patient-report")->with($data);
  }

  public function view_patient_report(Request $request) {
    $data['title'] = 'Patient Report';
    $data['allWardBed'] = WardBed::all();
    $start_date = $request->start_date;
    $end_date = $request->end_date;

    $sql = DB::table("users");
    if ($start_date && $end_date) {
      $sql = $sql->select('users.*')
      ->orderBy('users.id', 'desc')
      ->whereBetween('users.date', [$start_date, $end_date]);
    }

    if ($request->get("gender_id")) {
      $sql = $sql->where("users.gender_id", $request->get("gender_id"));
    }
    if ($request->get("religion")) {
      $sql = $sql->where("users.religion", $request->get("religion"));
    }
    if ($request->get("ward_id")) {
      $sql = $sql->where("users.ward_id", $request->get("ward_id"));
    }
    $data['allUsers'] = $sql->get();
    return view("backend.pages.report.patient.view-patient-report")->with($data);
  }
  public function create_patient_payment_report(Request $request) {
    $data['title'] = 'Create Patients Payment Report';
    return view("backend.pages.users.patient-payment.create-payment-report")->with($data);
  }

  public function view_patient_payment_report(Request $request) {
    $data['title'] = 'Patients Payment Report';
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $sql = DB::table("payment");
    if ($start_date && $end_date) {
      $sql = $sql->select('payment.*')
      ->orderBy('payment.id', 'desc')
      ->whereBetween('payment.date', [$start_date, $end_date]);
    }
    //dd($request->get("status"));
    if ($request->get("type")) {
      $sql = $sql->where("payment.type", $request->get("type"));
    }
    $result = $sql->get();
    $data['allResult'] = $result;
    return view("backend.pages.users.patient-payment.view-payment-report")->with($data);
  }
}
