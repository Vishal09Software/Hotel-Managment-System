<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $guarded ='id';
    protected $table ="room_types";
    protected $fillable = [
        'title',
        'detail'
    ];

    function roomtypeimages(){
        return $this->hasMany(Roomtypeimages::class,'room_type_id');
    }
}
