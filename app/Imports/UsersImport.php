<?php

namespace App\Imports;

use App\Models\Users;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithValidation, WithHeadingRow {

    public function model(array $row) {
        return new Users([
      
            'image' => $row['image'],
            'status' => $row['status'],
        ]);
    }

    public function rules(): array {
        return [

                      'image' => 'required',
        ];
    }

}
