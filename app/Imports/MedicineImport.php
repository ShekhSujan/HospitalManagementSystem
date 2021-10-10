<?php

namespace App\Imports;

use App\Models\Medicine;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MedicineImport implements ToModel, WithValidation, WithHeadingRow {

    public function model(array $row) {
        return new Medicine([
            'title' => $row['title'],
            'unit_price' => $row['unit_price'],
            'stock' => $row['stock'],
            'title' => $row['title'],
            'dosage' => $row['dosage'],
            'strength' => $row['strength'],
            'generic' => $row['generic'],
            'company' => $row['company'],
        ]);
    }

    public function rules(): array {
        return [
            'title' => 'required',
            'unit_price' => 'required',
            'stock' => 'required',
            'dosage' => 'required',
            'strength' => 'required',
            'generic' => 'required',
            'company' => 'required',
        ];
    }

}
