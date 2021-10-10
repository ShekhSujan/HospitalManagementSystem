<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model {

    use HasFactory;

    protected $table = 'admins';
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'type', 'image', 'status'
    ];

    public function doctor() {
        return $this->hasMany('App\Models\Doctor');
    }

}
