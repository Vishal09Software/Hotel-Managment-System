<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Service;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Service::all();
        return view('backend.services.service',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'small_desc' => 'required',
            'long_details'=>'required',
            'images'=>'required',
    ]);
    $insert = new Service;
    $insert->title = $request->input('title');
    $insert->small_desc = $request->input('small_desc');
    $insert->long_details = $request->input('long_details');
    if ($request->hasFile('images'))
        {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('backend/images/Services', $filename);
            $insert->images = $filename;
        }
        $insert->save();
    return  redirect('admin/service/create')->with('success' , 'Data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Service::find($id);
        return view('backend.services.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Service::find($id);
        return view('backend.services.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Service::find($id);
        $update->title = $request->input('title');
        $update->small_desc = $request->input('small_desc');
        $update->long_details = $request->input('long_details');
        if ($request->hasFile('images')) {
            $destination = 'backend/images/services/';
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
        return  redirect('admin/service/' .$id. '/edit')->with('success' , 'Data has been update.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Service::find($id);
        $destination = public_path('backend/images/services/' . $delete->image);
        if (File::exists($destination)) {
            File::delete($destination);
        } else {
            Log::error('File not found: ' . $destination);
        }
        $delete->delete();
        return  redirect('admin/service')->with('success' , 'Data has been delete.');
    }
}
