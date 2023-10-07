<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimages;


class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= RoomType::all();
        return view('backend.roomtype.roomtype',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.roomtype.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'detail'=>'required',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $insert = new RoomType;
    $insert->title = $request->input('title');
    $insert->price = $request->input('price');
    $insert->detail = $request->input('detail');
    $insert->save();

    foreach ($request->file('images') as $img) {
        if ($img->isValid()) {
            $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('backend/images/room_images'), $filename);
            $roomTypeImage = new Roomtypeimages;
            $roomTypeImage->room_type_id = $insert->id;
            $roomTypeImage->images = 'backend/images/room_images/' . $filename;
            $roomTypeImage->images_alt = $request->input('title');
            $roomTypeImage->save();
        }
    }
    return  redirect('admin/roomtype/create')->with('success' , 'Data has been added.');
     }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= RoomType::find($id);
        return view('backend.roomtype.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= RoomType::find($id);
        return view('backend.roomtype.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $update = RoomType::find($id);
    $update->title = $request->input('title');
    $update->price = $request->input('price');
    $update->detail = $request->input('detail');
    $update->save();

    if($request->hasFile('images')){
    foreach ($request->file('images') as $img) {
        if ($img->isValid()) {
            $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('backend/images/room_images'), $filename);
            $roomTypeImage = new Roomtypeimages;
            $roomTypeImage->room_type_id = $update->id;
            $roomTypeImage->images = 'backend/images/room_images/' . $filename;
            $roomTypeImage->images_alt = $request->input('title');
            $roomTypeImage->save();
        }
    }
    }
    return  redirect('admin/roomtype/' .$id. '/edit')->with('success' , 'Data has been update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $delete = RoomType::find($id);
    $delete->delete();
    return  redirect('admin/roomtype')->with('success' , 'Data has been delete.');
    }

    public function destroy_img(string $id)
    {
    $delete = Roomtypeimages::find($id);
    $delete->delete();
    return response()->json(['bool' => true]);;
    }
}
