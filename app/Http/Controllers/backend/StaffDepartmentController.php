<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Department;

class StaffDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Department::all();
        return view('backend.department.department',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.department.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'details'=>'required',
    ]);
    $insert = new Department;
    $insert->title = $request->input('title');
    $insert->details = $request->input('details');
    $insert->save();
    return  redirect('admin/department/create')->with('success' , 'Data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Department::find($id);
        return view('backend.department.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Department::find($id);
        return view('backend.department.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Department::find($id);
        $update->title = $request->input('title');
        $update->details = $request->input('details');
        $update->save();
        return  redirect('admin/department/' .$id. '/edit')->with('success' , 'Data has been update.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Department::find($id);
        $delete->delete();
        return  redirect('admin/department')->with('success' , 'Data has been delete.');
    }
}
