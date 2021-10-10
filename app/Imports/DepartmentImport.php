<?php

namespace App\Imports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DepartmentImport implements ToModel, WithValidation, WithHeadingRow {

    public function model(array $row) {
        return new Department([
            'title' => $row['title'],
        ]);
    }

    public function rules(): array {
        return [
            'title' => 'required|unique:department',
        ];
    }

}
