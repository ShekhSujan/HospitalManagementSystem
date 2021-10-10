<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Users;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Carbon\Carbon;
use File;
use Image;

class AppointmentController extends Controller {

    public function index() {
        $data['title'] = "Appointments";
        $data['allAppointment'] = Appointment::select('appointment.*', 'users.id as user_id', 'users.name as user_name', 'users.phone as user_phone')
                ->join("users", "users.id", "=", "appointment.patient_id")
                ->orderBy('appointment.id', 'desc')
                ->get();
        // #########Count Appointment Section
        $Today = Carbon::today();
        $Days7 = Carbon::today()->subDays(7);
        $Days30 = Carbon::today()->subDays(30);
        $data['todaysAppointment'] = Appointment::whereDate('created_at', $Today)->count();
        $data['last7DaysAppointment'] = Appointment::whereDate('created_at', '>=', $Days7)->count();
        $data['last30DaysAppointment'] = Appointment::whereDate('created_at', '>=', $Days30)->count();
        $data['pendingAppointment'] = Appointment::where('status', 0)->count();
        $data['cancledAppointment'] = Appointment::where('status', 1)->count();
        $data['approvedAppointment'] = Appointment::where('status', 2)->count();
        //dd($data['pendingAppointment'],$data['approvedAppointment']);
        return view('backend.pages.appointment.index')->with($data);
    }

    public function create(Request $request) {
        $data['title'] = 'Create Appointment';
        $data['allSpeciality'] = Speciality::All();
        $data['allDoctor'] = Doctor::All();

        return view("backend.pages.appointment.create")->with($data);
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
        $Users->status = 1;
        $Users->type = 1;
        $Users->image = $ext;
        $Users->date = date("Y-m-d");
        //  dd($Users);
        $Users->save();
        $Appointment = new Appointment();
        $Appointment->patient_id = $Users->id;
        $Appointment->speciality_id = $request->speciality_id;
        $Appointment->checkup_date = $request->checkup_date;
        $Appointment->doctor_id = $request->doctor_id;
        $Appointment->amount = $request->amount;
        $Appointment->payment_id = $request->payment_id;
        $Appointment->remarks = $request->remarks;
        $Appointment->status = $request->app_status;
         $Appointment->date = date("Y-m-d");
        $Appointment->save();
        //dd($Appointment);
        if ($photo) {
            Image::make($photo)->resize(200, 200)->save("assets/images/users/" . $Users->id . '.' . $ext);
            return redirect()->back()->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function edit(Request $request, $id) {
        $data['title'] = "Update Appointment";
        $data['allAppointment'] = Appointment::select('appointment.*', 'users.id as user_id', 'users.name as user_name',
        'users.phone as user_phone', 'users.email as user_email',
         'users.age as user_age', 'users.gender_id as gender_id',
          'users.image as user_image', 'doctors.name as doctor_name', 'speciality.title as speciality_title'
                )
                ->join("users", "users.id", "=", "appointment.patient_id")
                ->join("doctors", "doctors.id", "=", "appointment.doctor_id")
                ->join("speciality", "speciality.id", "=", "appointment.speciality_id")
                ->where('appointment.id', $id)
                ->get();

        $data['allUsers'] = Users::select('*')->get();
        $data['allSpeciality'] = Speciality::select('*')->get();
        $data['allDoctor'] = Doctor::select('*')->get();
        $data['selected'] = Appointment::find($id);
        return view("backend.pages.appointment.edit")->with($data);
    }

    public function update(Request $request) {
        $id = $request->input("id");
        $arr = [
            "speciality_id" => $request->input("speciality_id"),
            "type" => $request->input("type"),
            "doctor_id" => $request->input("doctor_id"),
            "checkup_date" => $request->input("checkup_date"),
            "remarks" => $request->input("remarks"),
            "amount" => $request->input("amount"),
            "payment_id" => $request->input("payment_id"),
            "status" => $request->input("status"),
        ];
        //dd($arr);
        if (Appointment::where('id', $id)->update($arr)) {
            return back()->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
        ;
    }

    public function destroy(Request $request) {
        $id = $request->input("id");
        if (Appointment::where("id", $id)->delete()) {
            return redirect()->back()->with("msg", "Delete Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

}
