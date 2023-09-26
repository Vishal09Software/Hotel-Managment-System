<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded ='id';
    protected $table ="customers";
    protected $fillable = [
        'full_name',
        'email',
        'address',
        'mobile',
        'images',
        'password',
    ];

    function bookings(){
        return $this->hasMany(Booking::class);
    }
}
