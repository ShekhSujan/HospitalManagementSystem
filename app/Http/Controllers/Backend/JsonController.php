<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Complain;
use App\Models\Advice;
use App\Models\InvType;
use App\Models\Medicine;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class JsonController extends Controller {

    public function complain_store(Request $request) {
        if ($request->ajax()) {
            $arr = [
                'title' => $request->input('title'),
                'status' => 1
            ];
            $nID = Complain::insertGetId($arr);
            if ($nID) {
                return response()->json([
                            'success' => $nID, 'message' => 'New Complain added successfull'
                ]);
            } else {
                return response()->json([
                            'message' => 'Some Error Occurs'
                ]);
            }
        }
    }

    public function inv_store(Request $request) {
        if ($request->ajax()) {
            $arr = [
                'title' => $request->input('title'),
                'status' => 1
            ];
            $nID = InvType::insertGetId($arr);
            if ($nID) {
                return response()->json([
                            'success' => $nID, 'message' => 'New Inv added successfull'
                ]);
            } else {
                return response()->json([
                            'message' => 'Some Error Occurs'
                ]);
            }
        }
    }

    public function advice_store(Request $request) {
        if ($request->ajax()) {
            $arr = [
                'title' => $request->input('title'),
                'status' => 1
            ];
            $nID = Advice::insertGetId($arr);
            if ($nID) {
                return response()->json([
                            'success' => $nID, 'message' => 'New Advice added successfull'
                ]);
            } else {
                return response()->json([
                            'message' => 'Some Error Occurs'
                ]);
            }
        }
    }

    public function medicine_store(Request $request) {
        if ($request->ajax()) {
            $arr = [
                "title" => $request->input("title"),
                "company" => $request->input("company"),
                "dosage" => $request->input("dosage"),
                "strength" => $request->input("strength"),
                "generic" => $request->input("generic"),
                'status' => 1
            ];
            $nID = Medicine::insertGetId($arr);
            if ($nID) {
                return response()->json([
                            'success' => $nID, 'message' => 'New Medicine added successfull'
                ]);
            } else {
                return response()->json([
                            'message' => 'Some Error Occurs'
                ]);
            }
        }
    }

    public function checkPatient(Request $request) {
        $id = $request->input('id');
        $response = Users::find($id);
        return response()->json($response);
    }

    public function doc($speciality_id) {
        $speciality = Doctor::where("speciality_id", '=', $speciality_id)->get();
        return json_encode($speciality);
    }

}
