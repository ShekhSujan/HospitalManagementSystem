<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model {

    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'gender_id',
        'age',
        'image',
        'status'
    ];

    public function appointment() {
        return $this->hasMany('App\Models\Appointment');
    }

}
