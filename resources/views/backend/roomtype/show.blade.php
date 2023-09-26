@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$data->title}}</h4>
                            <a href="{{ url('/roomtype') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            <form class="forms-sample">
                                <div class="form-group">
                                  <label for="exampleInputUsername1">Id</label>
                                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" disabled value=" {{ $data->id }}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Title </label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price </label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->price }}">
                                  </div>

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Gallery </label>
                                    @foreach ($data->roomtypeimages as $gallery)
                                    <img src="{{ asset($gallery->images) }}" alt="img"
                                    width="50px" height="50px">
                                    @endforeach
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Details </label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value="  {{ $data->detail }}">
                                </div>

                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
