<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded ='id';
    protected $table ="departments";
    protected $fillable = [
        'title',
        'details',
    ];
}
