@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit {{$data->title}}</h4>
                            <a href="{{url('/rooms')}}" >
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{url('/rooms/'.$data->id)}}" method="post" class="forms-sample">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input type="text" name="title" value="{{$data->title}}"  class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <label for="">Room Type Select </label>
                                <select class="form-control" name="room_type_id" id="">
                                    <option disabled selected>Select Room Type</option>
                                    @foreach ($roomtype as $roomtypes)
                                    {{-- <option @if($data->room_type_id == $roomtypes->room_type_id) selected @endif value="{{$roomtypes->id}}">{{$roomtypes->title}}</option> --}}
                                    <option @if($data->room_type_id == $roomtypes->id) selected="selected" @endif value="{{$roomtypes->id}}">{{$roomtypes->title}}</option>

                                    @endforeach
                                </select>



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
