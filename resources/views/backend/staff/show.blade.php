@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$data->full_name}}</h4>
                            <a href="{{ url('/staff') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->full_name }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Department </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->department->title }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Salary Type </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->salary_type }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Salary </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->salary_amt }}">
                                  </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bio </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value="  {{ $data->bio }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <img src="{{ asset('backend/images/staff/' . $data->images) }}" alt="img" width="150px" height="150px">
                                  </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
