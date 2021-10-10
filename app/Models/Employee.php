<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

    use HasFactory;

    protected $table = 'employee';
    protected $fillable = [
        'name',
         'email',
          'phone',
          'nid',
          'dob',
          'gender',
          'religion',
          'address',
          'last_education',
          'result',
          'maritial_status',
          'image',
          'joining_date',
          'department',
          'designation',
          'salary',
          'increment_details',
          'emergency_name',
          'emergency_phone',
          'emergency_address',
          'bank_name',
          'bank_number',
          'bank_branch',
          'status'
    ];

}
