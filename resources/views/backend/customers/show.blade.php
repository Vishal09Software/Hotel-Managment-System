@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <h4 class="card-title">{{$data->full_name}}</h4>
                            <a href="{{ url('admin/customers') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                        <div class="card-body">
                            <form class="forms-sample">
                                <div class="form-group">
                                  <label for="exampleInputUsername1">Name</label>
                                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" disabled value=" {{ $data->full_name }}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email </label>
                                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->email }}">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Mobile </label>
                                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->mobile }}">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Address </label>
                                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->address }}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Image</label>
                                  <img src="{{ asset('backend/images/customers/' . $data->images) }}" alt="img" width="50px" height="50px">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" disabled value="{{ $data->password }}">
                                </div>

                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
