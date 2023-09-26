@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Customer </h4>
                            <a href="{{ url('/customers') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{url('/customers') }}" method="post" enctype="multipart/form-data" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Full Name</label>
                                    <input type="text" name="full_name" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('full_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Mobile</label>
                                    <input type="tel" name="mobile" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('mobile')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">User Image</label>
                                    <input type="file" name="images" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('images')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
