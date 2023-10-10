<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\Contact;

use Mail;

class HomeController extends Controller
{
    //Home Page
    public function home(){
    $roomsTypes = RoomType::all();
    $services = Service::all();
    return view('frontend.index',['roomsTypes'=> $roomsTypes,'services'=> $services]);
    }

    //service
    public function rooms(){
        $roomsTypes = RoomType::all();
        $services = Service::all();
        return view('frontend.rooms',['roomsTypes'=> $roomsTypes,'services'=> $services]);
    }

    //service
    public function service(){
        $roomsTypes = RoomType::all();
        $services = Service::all();
        return view('frontend.services',['roomsTypes'=> $roomsTypes,'services'=> $services]);
    }

    //save contact
    public function save_contact(Request $request)
    {
    $insert = new Contact;
    $insert->name = $request->input('name');
    $insert->email = $request->input('email');
    $insert->phone = $request->input('phone');
    $insert->subject = $request->input('subject');
    $insert->msg = $request->input('msg');
    $insert->save();

    return redirect('/contact')->with('success', 'Your message was sent successfully.');
    }


    //service_details
    public function service_details(Request $request ,$id){
        $roomsTypes = RoomType::all();
        $service = Service::find($id);
        return view('frontend.service-details',['roomsTypes'=> $roomsTypes,'service'=> $service]);
    }

    // //room details Page
    public function room_details(Request $request ,$id){
        $roomsType = RoomType::find($id);
        $service = Service::all();
        return view('frontend.room-details',['roomsType'=> $roomsType,'service'=> $service]);
    }



    public function facilities(){
        return view('frontend.facilities');
    }

    public function aboutus(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }
}
