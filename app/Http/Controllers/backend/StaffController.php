<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Staff;
use App\Models\StaffPayment;
use App\Models\Department;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Staff::all();
        $department = Department::all();
        return view('backend.staff.staff',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = Department::all();
        return view('backend.staff.create',['department'=>$department]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name'=>'required',
            'department_id'=>'required',
            'bio'=>'required',
            'salary_type'=>'required',
            'salary_amt'=>'required',
            'images'=>'required',
    ]);
    $insert = new Staff;
    $insert->full_name = $request->input('full_name');
    $insert->department_id = $request->input('department_id');
    $insert->bio = $request->input('bio');
    $insert->salary_type = $request->input('salary_type');
    $insert->salary_amt = $request->input('salary_amt');
    if ($request->hasFile('images'))
        {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('backend/images/staff', $filename);
            $insert->images = $filename;
        }
    $insert->save();
    return  redirect('admin/staff/create')->with('success' , 'Data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Staff::find($id);
        return view('backend.staff.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Staff::find($id);
        $department = Department::all();
        return view('backend.staff.edit',['data'=>$data,'department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Staff::find($id);
        $update->full_name = $request->input('full_name');
        $update->department_id = $request->input('department_id');
        $update->bio = $request->input('bio');
        $update->salary_type = $request->input('salary_type');
        $update->salary_amt = $request->input('salary_amt');
        if ($request->hasFile('images')) {
            $destination = 'backend/images/staff/';
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
        return  redirect('admin/staff/' .$id. '/edit')->with('success' , 'Data has been update.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Staff::find($id);
        $delete->delete();
        return  redirect('admin/staff')->with('success' , 'Data has been delete.');
    }



    //Payments All
    public function all_payments(Request $request, $staff_id){
        $data = StaffPayment::where('staff_id',$staff_id)->get();
        $staff = Staff::find($staff_id);
        return view('backend.staffpayment.payment',['staff_id'=>$staff_id , 'data'=>$data,'staff'=>$staff]);
    }

    // Add Payments
    public function add_payment($staff_id){

        return view('backend.staffpayment.create',['staff_id'=>$staff_id]);

    }

    public function save_payment(Request $request, $staff_id)
    {
    $request->validate([
        'amount' => 'required',
        'payment_date' => 'required|date',
    ]);

    $insert = new StaffPayment;
    $insert->staff_id = $staff_id;
    $insert->amount = $request->input('amount');
    $insert->payment_date = $request->input('payment_date');
    $insert->save();

    return redirect('admin/staff/payment/' . $staff_id . '/add')->with('success', 'Data has been added.');
    }

    public function delete_payment(string $id ,$staff_id)
    {
        //  StaffPayment::find($id)->delete();
        StaffPayment::where('id',$id)->delete();

        return  redirect('admin/staff/payments/' . $staff_id )->with('success' , 'Data has been delete.');
    }




}
