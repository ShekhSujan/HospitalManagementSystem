<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model {

    use HasFactory;

    protected $table = 'medex';
    protected $fillable = [
        'title','unit_price','stock', 'company', 'dosage', 'strength', 'generic', 'status'
    ];

}
