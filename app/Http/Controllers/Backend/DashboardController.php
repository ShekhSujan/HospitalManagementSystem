<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Medicine;
use App\Models\Appointment;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\WardBed;
use App\Models\Payment;
use Carbon\Carbon;
use DB;
use Arr;

class DashboardController extends Controller {

    public function index() {
        $data['Tittle'] = "Home Page";

        //Dashboard Count Start
        $data['allPatient'] = Users::count();
        $data['allMedicine'] = Medicine::count();
        $data['allAppointmentCount'] = Appointment::count();
        $data['allEmployeeCount'] = Employee::count();
        $data['allCustomersCount'] = Customer::count();
        $data['allDoctorCount'] = Doctor::count();
        $data['allMedicineCount'] = Medicine::count();
        $data['allWardCount'] = WardBed::count();
        $data['allBedCount'] = WardBed::sum('bed');
        $data['allAdminCount'] = Admin::where('role', 3)->count();
        $data['allOperatorCount'] = Admin::where('role', 1)->count();

        //todays appointment
        $Today = Carbon::today();

        $data['allYearlyReport'] = Users::select(DB::raw("(COUNT(*)) as count"), DB::raw("MONTHNAME(created_at) as monthname"))
                ->whereYear('created_at', date('Y'))
                ->groupBy('monthname')
                ->orderBy('created_at', 'asc')
                ->get();
        $data['allMale'] = Users::where('gender_id', 1)->count();
        $data['allFemale'] = Users::where('gender_id', 2)->count();
        $data['allOthers'] = Users::where('gender_id', 3)->count();

    $cash = Payment::where('type', 1)->sum('amount');
    $cash2 = Appointment::where('payment_id', 1)->sum('amount');
    $data['allCash']=$cash+$cash2;

    $bkash = Payment::where('type', 2)->sum('amount');
    $bkash2 = Appointment::where('payment_id', 2)->sum('amount');
    $data['allBkash']=$bkash+$bkash2;

    $rocket = Payment::where('type', 3)->sum('amount');
    $rocket2 = Appointment::where('payment_id', 3)->sum('amount');
    $data['allRocket']=$rocket+$rocket2;

        //  /Age Wise Data  Start
        $data['allAgeWiseReport'] = DB::table('users')
                ->select(DB::raw('concat(10*floor(age/10), \'-\', 10*floor(age/10) + 9) as `range`, count(*) as `count_by_range`,
        SUM(IF(gender_id=1,1,0)) as `Male`,SUM(IF(gender_id=2,1,0)) as `Female`,SUM(IF(gender_id=3,1,0)) as `Others`'))
                ->groupBy('range')
                ->get();

        return view('backend.pages.home.home')->with($data);
    }

    public function admin_login() {
        return view('auth.admin.login');
    }

    public function cache() {
        return view('backend.app.cache');
    }
    public function unauthorized()
    {
      $data['title']='Unauthorized Access';
      return view('backend.app.unauthorized')->with($data);
    }
    // SELECT A.`Age Bracket`, COUNT(*) `Total Count`,
    // SUM(IF(A.gender_id='2',1,0)) Female,
    // SUM(IF(A.gender_id='1',1,0)) Male,
    // SUM(IF(A.gender_id='3',1,0)) Others
    // FROM
    // (SELECT
    // CASE WHEN age BETWEEN 0 AND 20 THEN '0-20'
    // WHEN age BETWEEN 21 AND 30 THEN '21-30'
    // WHEN age BETWEEN 31 AND 40 THEN '31-40'
    // WHEN age BETWEEN 41 AND 50 THEN '41-50'
    // WHEN age BETWEEN 51 AND 60 THEN '51-60'
    // WHEN age BETWEEN 61 AND 70 THEN '61-70'
    // WHEN age BETWEEN 71 AND 80 THEN '71-80'
    // WHEN age BETWEEN 81 AND 90 THEN '81-90'
    // ELSE '91-100'
    // END `Age Bracket`, gender_id
    // FROM users
    // WHERE age BETWEEN 0 AND 100) A
    // GROUP BY A.`Age Bracket`
    // ORDER BY A.`Age Bracket`
    // SELECT A.`Age Range`, COUNT(*) `Total Count`, SUM(IF(A.gender_id='2',1,0)) Female, SUM(IF(A.gender_id='1',1,0)) Male, SUM(IF(A.gender_id='3',1,0)) Others
    // FROM
    // (SELECT
    //   concat(10*floor(age/10), '-', 10*floor(age/10) + 10) as `Age Range`, gender_id
    // FROM users
    // WHERE age BETWEEN 0 AND 100) A
    // GROUP BY A.`Age Range`
    // ORDER BY A.`Age Range`
}
