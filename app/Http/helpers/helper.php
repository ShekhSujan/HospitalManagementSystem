<?php

use App\Models\Appointment;
use App\Models\Users;
use Carbon\Carbon;

function appointment_report() {
    $Today = Carbon::today();
    $Days7 = Carbon::today()->subDays(7);
    $Days30 = Carbon::today()->subDays(30);
    $appointment['todaysAppointment'] = Appointment::whereDate('created_at', $Today)->count();
    $appointment['last7DaysAppointment'] = Appointment::whereDate('created_at', '>=', $Days7)->count();
    $appointment['last30DaysAppointment'] = Appointment::whereDate('created_at', '>=', $Days30)->count();
    $appointment['pendingAppointment'] = Appointment::where('status', 0)->count();
    $appointment['cancledAppointment'] = Appointment::where('status', 1)->count();
    $appointment['approvedAppointment'] = Appointment::where('status', 2)->count();
    return $appointment;
}

function patient_report() {
    $Days7 = Carbon::today()->subDays(7);
    $Days30 = Carbon::today()->subDays(30);
    $patient['todaysPatient'] = Users::whereDate('created_at', Carbon::today())->where('type', '2')->count();
    $patient['last7DaysPatient'] = Users::whereDate('created_at', '>=', $Days7)->where('type', '2')->count();
    $patient['last30DaysPatient'] = Users::whereDate('created_at', '>=', $Days30)->where('type', '2')->count();
    $patient['pendingPatient'] = Users::where('status', 0)->where('type', '2')->count();
    $patient['approvedPatient'] = Users::where('status', 1)->where('type', '2')->count();
    return $patient;
}
