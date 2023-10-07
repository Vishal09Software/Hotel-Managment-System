<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;


class BookingController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Booking::all();
        return view('backend.bookings.bookings',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $rooms = Room::all();
        return view('backend.bookings.create',['customers'=>$customers,'rooms'=>$rooms]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=>'required',
            'room_id' => 'required',
            'checkin_date'=>'required',
            'checkout_date'=>'required',
            'total_adults'=>'required',
            'total_children'=>'required',
    ]);
    $insert = new Booking;
    $insert->customer_id = $request->input('customer_id');
    $insert->room_id = $request->input('room_id');
    $insert->checkin_date = $request->input('checkin_date');
    $insert->checkout_date = $request->input('checkout_date');
    $insert->total_adults = $request->input('total_adults');
    $insert->total_children = $request->input('total_children');
    $insert->save();
    return  redirect('/booking/create')->with('success' , 'Data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Booking::find($id);
        return view('backend.bookings.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Booking::find($id);
        return view('backend.bookings.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Booking::find($id);
        $update->full_name = $request->input('full_name');
        $update->email = $request->input('email');
        $update->address = $request->input('address');
        $update->mobile = $request->input('mobile');
        $update->password = Hash::make($request->input('password'));
        if ($request->hasFile('images')) {
            $destination = 'backend/images/Bookings/';
            if (File::exists($destination . $update->images)) {
                File::delete($destination . $update->images);
            }
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path($destination), $filename);
            $update->images = $filename;

        }
        $update->save();
        return  redirect('/booking/' .$id. '/edit')->with('success' , 'Data has been update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Booking::find($id);
        $delete->delete();
        return  redirect('/booking')->with('success' , 'Data has been delete.');
    }


    //check rooms avilables
    public function avilable_rooms(Request $request ,$checkin_date){
        $arooms = DB::select("select * from rooms where id not in
        (select room_id from bookings where '$checkin_date' between checkout_date and '$checkin_date'  )");
        return  response()->json(['data'=>$arooms]);
    }
}
