<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithValidation, WithHeadingRow {

    public function model(array $row) {
        return new Customer([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'address' => $row['address'],
        ]);
    }

    public function rules(): array {
        return [
            'phone' => 'required|unique:customer',
        ];
    }

}
