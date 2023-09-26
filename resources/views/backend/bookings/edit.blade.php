@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit {{$data->full_name}}</h4>
                            <a href="{{url('/customers')}}" >
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{url('/customers/'.$data->id)}}" method="post" class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="full_name" class="form-control" id="exampleInputUsername1" placeholder="Username"  value=" {{ $data->full_name }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email </label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"  value=" {{ $data->email }}">
                                  </div>

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile </label>
                                    <input type="tel" name="mobile" class="form-control" id="exampleInputEmail1" placeholder="Mobile"  value=" {{ $data->mobile }}">
                                  </div>

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Address </label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="address"  value=" {{ $data->address }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <img src="{{ asset('backend/images/customers/' . $data->images) }}" alt="img" width="50px" height="50px">
                                    <input type="file" name="images" class="form-control">
                                  </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  value="{{ $data->password }}">
                                  </div>

                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
