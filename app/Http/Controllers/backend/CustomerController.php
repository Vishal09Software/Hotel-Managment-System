<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Customer;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Customer::all();
        return view('backend.customers.customers',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customers.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name'=>'required',
            'email' => 'required',
            'address'=>'required',
            'mobile' => 'required|regex:/^[0-9]{10}$/',
            'images'=>'required',
            'password'=>'required',
    ]);
    $insert = new Customer;
    $insert->full_name = $request->input('full_name');
    $insert->email = $request->input('email');
    $insert->address = $request->input('address');
    $insert->mobile = $request->input('mobile');
    $insert->password = Hash::make($request->input('password'));
    if ($request->hasFile('images'))
        {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('backend/images/customers', $filename);
            $insert->images = $filename;
        }
        $insert->save();
        $ref = $request->ref;
        if($ref == 'front')
        {
    return  redirect('/register')->with('success' , 'Data has been saved.');
        }
    return  redirect('admin/customers/create')->with('success' , 'Data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Customer::find($id);
        return view('backend.customers.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Customer::find($id);
        return view('backend.customers.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Customer::find($id);
        $update->full_name = $request->input('full_name');
        $update->email = $request->input('email');
        $update->address = $request->input('address');
        $update->mobile = $request->input('mobile');
        $update->password = Hash::make($request->input('password'));
        if ($request->hasFile('images')) {
            $destination = 'backend/images/customers/';
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
        return  redirect('admin/customers/' .$id. '/edit')->with('success' , 'Data has been update.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Customer::find($id);
        $destination = public_path('backend/images/customers/' . $delete->image);
        if (File::exists($destination)) {
            File::delete($destination);
        } else {
            Log::error('File not found: ' . $destination);
        }
        $delete->delete();
        return  redirect('admin/customers')->with('success' , 'Data has been delete.');
    }


    //login
    public function login(){
        return view('frontend.login');
    }

    //login check
    public function customer_login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        // Find a customer with the provided email
        $customer = Customer::where('email', $email)->first();

        if ($customer) {
            if (Hash::check($password, $customer->password)) {
                session(['customerlogin' => true, 'data' => $customer]);
                return redirect('/');
            } else {
                return redirect('login/')->with('error', 'Invalid email and password.');
            }
        } else {
            return redirect('login/')->with('error', 'Invalid email and password.');
        }
    }


    //register
    public function register(){
        return view('frontend.register');
    }

    //logout
    public function logout(){
        session()->forget(['customerlogin','customer']);
        return redirect('login/');

    }
}
