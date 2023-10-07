<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class HomeController extends Controller
{
    //Home Page
    public function home(){
    $roomsTypes = RoomType::all();
    return view('frontend.index',['roomsTypes'=>$roomsTypes]);
    }
}
