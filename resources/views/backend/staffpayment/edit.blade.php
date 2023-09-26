@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit {{ $data->full_name }}</h4>
                            <a href="{{ url('/staff') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{ url('/staff/' . $data->id) }}" method="post" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="full_name" class="form-control" id="exampleInputUsername1"
                                        placeholder="Username" value=" {{ $data->full_name }}">
                                </div>

                                <div class="form-group">
                                <label for="">Department  </label>
                                <select class="form-control" name="department_id" id="">
                                    <option disabled selected>Select Department Type</option>
                                    @foreach ($department as $departments)
                                    {{-- <option @if($data->room_type_id == $roomtypes->room_type_id) selected @endif value="{{$roomtypes->id}}">{{$roomtypes->title}}</option> --}}
                                    <option @if($data->department_id == $departments->id) selected="selected" @endif value="{{$departments->id}}">{{$departments->title}}</option>

                                    @endforeach
                                </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Salary Type</label>
                                    <select class="form-control" name="salary_type" id="">
                                        <option disabled selected>Select Salary Type</option>
                                        <option @if($data->salary_type == 'daily') selected="selected" @endif value="daily">Daily</option>
                                        <option @if($data->salary_type == 'month') selected="selected" @endif value="month">Month</option>
                                        {{-- <option value="">Month</option> --}}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Salary Amount</label>
                                    <input type="text" name="salary_amt" class="form-control" id="exampleInputUsername1"
                                        placeholder="Username" value=" {{ $data->salary_amt }}">
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset('backend/images/staff/' . $data->images) }}" alt="img" width="50px" height="50px">
                                    <input type="file" name="images" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bio </label>
                                    <textarea name="bio" id="" class="form-control" rows="10">{{ $data->bio }}</textarea>
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
