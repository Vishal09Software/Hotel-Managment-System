@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add staff </h4>
                            <a href="{{ url('/staff') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{url('/staff') }}" method="post" enctype="multipart/form-data" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Full Name</label>
                                    <input type="text" name="full_name" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <label for="">Department Types </label>
                                <select class="form-control" name="department_id" id="">
                                    <option disabled selected>Department Select</option>
                                    @foreach ($department as $departments)
                                    <option value="{{$departments->id}}">{{$departments->title}}</option>
                                    @endforeach
                                </select>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bio</label>
                                    <textarea name="bio" id="" class="form-control" rows="10"></textarea>
                                </div>
                                <div style="color: red">
                                    @error('bio')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <label for="">Salary Types </label>
                                <select class="form-control" name="salary_type" id="">
                                    <option disabled selected>Department Select</option>
                                    <option value="daily">Daily</option>
                                    <option value="month" >Month</option>
                                </select>
                                <div style="color: red">
                                    @error('salary_type')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Salary Amount</label>
                                    <input type="text" name="salary_amt" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('salary_amt')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Image</label>
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
