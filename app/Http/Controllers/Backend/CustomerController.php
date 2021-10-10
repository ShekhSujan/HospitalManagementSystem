<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
class CustomerController extends Controller {

    public function create() {
        $data['title'] = "Customer Create";
        $data['allCustomer'] = Customer::All()->sortByDesc('id');
        return view('backend.pages.customer.create')->with($data);
    }

    public function store(Request $request) {
        $arr = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];
        if (Customer::create($arr)) {
            return redirect()->back()->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function edit($id) {
        $data['title'] = "Customer Edit";
        $data['allCustomer'] = Customer::All()->sortByDesc('id');
        $data['selected'] = Customer::find($id);
        return view('backend.pages.customer.edit')->with($data);
    }

    public function update(Request $request) {
        $id = $request->input("id");
        $arr = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];
        //ddd($arr);
        if (Customer::where('id', $id)->update($arr)) {
            return redirect()->route('backend.customer.create')->with("msg", "Update Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }
    public function excel_store(Request $request) {
        $file = Excel::import(new CustomerImport, request()->file('file'));
        if ($file) {
            return redirect()->route('backend.customer.create')->with("msg", "Save Successfully");
        }
        return redirect()->back()->with("error", "Some Error Occurs");
    }

    public function destroy(Request $request) {
        $id = $request->input("id");
        if (Customer::where("id", $id)->delete()) {
            return redirect()->route('backend.customer.create')->with("msg", "Delete Successfully");
        }
        return redirect()->route('backend.customer.create')->with("error", "Some Error Occurs");
    }

    public function bulk_destroy(Request $request) {
        $id = $request->input("chk");
        // dd($id);
        if ($id) {
            if (Customer::whereIn("id", $id)->delete()) {
                return redirect()->route('backend.customer.create')->with("msg", "Delete Successfully");
            }
            return redirect()->route('backend.customer.create')->with("error", "Some Error Occurs");
        }
        return redirect()->route('backend.customer.create')->with("error", "Select Some Item First");
    }

}
