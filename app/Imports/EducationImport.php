<?php

namespace App\Imports;

use App\Models\Education;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EducationImport implements ToModel, WithValidation, WithHeadingRow {

    public function model(array $row) {
        return new Education([
            'title' => $row['title'],
        ]);
    }

    public function rules(): array {
        return [
            'title' => 'required|unique:education',
        ];
    }

}
