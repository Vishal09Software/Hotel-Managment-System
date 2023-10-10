<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded ='id';
    protected $table ="services";
    protected $fillable = [
        'title',
        'small_desc',
        'long_details',
        'images',

    ];
}
