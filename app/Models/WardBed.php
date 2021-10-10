<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardBed extends Model {

    use HasFactory;

    protected $table = 'ward-bed';
    protected $fillable = [
        'title','bed', 'charge','status'
    ];

}
