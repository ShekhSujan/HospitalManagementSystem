<?php

namespace App\Imports;

use App\Models\Designation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DesignationImport implements ToModel, WithValidation, WithHeadingRow {

    public function model(array $row) {
        return new Designation([
            'title' => $row['title'],
        ]);
    }

    public function rules(): array {
        return [
            'title' => 'required|unique:designation',
        ];
    }

}
