<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithValidation, WithHeadingRow {

    public function model(array $row) {
        return new Employee([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'nid' => $row['nid'],
            'dob' => $row['dob'],
            'gender' => $row['gender'],
            'religion' => $row['religion'],
            'address' => $row['address'],
            'last_education' => $row['last_education'],
            'result' => $row['result'],
            'maritial_status' => $row['maritial_status'],
            'joining_date' => $row['joining_date'],
            'department' => $row['department'],
            'designation' => $row['designation'],
            'salary' => $row['salary'],
            'increment_details' => $row['increment_details'],
            'emergency_name' => $row['emergency_name'],
            'emergency_phone' => $row['emergency_phone'],
            'emergency_address' => $row['emergency_address'],
            'bank_name' => $row['bank_name'],
            'bank_number' => $row['bank_number'],
            'bank_branch' => $row['bank_branch'],
        ]);
    }

    public function rules(): array {
        return [
            'slug' => 'required|unique:employee',
        ];
    }

}
