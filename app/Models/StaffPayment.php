<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPayment extends Model
{
    use HasFactory;
    protected $guarded ='id';
    protected $table ="staff_payments";
    protected $fillable = [
        'staff_id',
        'amount',
        'payment_date',
    ];
}
