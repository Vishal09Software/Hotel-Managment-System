<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;



class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Room::all();
        $roomtype = RoomType::all();
        return view('backend.room.room',['data'=>$data,'roomtype'=>$roomtype]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomtype = RoomType::all();
        return view('backend.room.create',['roomtype'=>$roomtype]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
    ]);
    $insert = new Room;
    $insert->title = $request->input('title');
    $insert->room_type_id = $request->input('room_type_id');
    $insert->save();
    return  redirect('/rooms/create')->with('success' , 'Data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Room::find($id);
        return view('backend.room.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Room::find($id);
        $roomtype = RoomType::all();
        return view('backend.room.edit',['data'=>$data,'roomtype'=>$roomtype]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $update = Room::find($id);
    $update->title = $request->input('title');
    $update->room_type_id = $request->input('room_type_id');
    $update->save();
    return  redirect('/rooms/' .$id. '/edit')->with('success' , 'Data has been update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $delete = Room::find($id);
    $delete->delete();
    return  redirect('/rooms')->with('success' , 'Data has been delete.');


    }
}
