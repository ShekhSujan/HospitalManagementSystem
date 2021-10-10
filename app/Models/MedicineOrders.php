<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineOrders extends Model {

    use HasFactory;

    protected $table = 'medicine_orders';
    protected $fillable = [
        'customer_id','total','tax','subtotal'
    ];

}
