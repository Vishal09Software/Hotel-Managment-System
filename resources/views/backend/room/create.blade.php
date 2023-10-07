@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Room</h4>
                            <a href="{{ url('admin/rooms') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{ url('admin/rooms') }}" method="post" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                <label for="">Room Type Select </label>
                                <select class="form-control" name="room_type_id" id="">
                                    <option disabled selected>Select Room Type</option>
                                    @foreach ($roomtype as $roomtypes)
                                    <option value="{{$roomtypes->id}}">{{$roomtypes->title}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div style="color: red">
                                    @error('room_type_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2 mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
