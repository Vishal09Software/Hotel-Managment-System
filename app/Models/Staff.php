<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guarded ='id';
    protected $table ="staff";
    protected $fillable = [
        'full_name',
        'department_id',
        'bio',
        'salary_type',
        'salary_amt',
        'images',
    ];

    function department(){
        return $this->belongsTo(Department::class,'department_id');

    }
}
