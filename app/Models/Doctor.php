<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {

    use HasFactory;

    protected $table = 'doctors';
    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->belongsTo('App\Models\Users', 'id');
    }

}
