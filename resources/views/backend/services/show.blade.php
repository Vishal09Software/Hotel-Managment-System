@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$data->title}}</h4>
                            <a href="{{ url('admin/service') }}">
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
                                    <label for="exampleInputUsername1">Short Desc</label>
                                    <textarea name="small_desc" id="" disabled class="form-control" rows="10">{{ $data->small_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Short Desc</label>
                                    <textarea name="small_desc" id="" disabled class="form-control" rows="10">{{ $data->long_details }}</textarea>
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Gallery </label>
                                    <img src="{{ asset('backend/images/services/' . $data->images) }}" alt="img" width="50px" height="50px">
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
