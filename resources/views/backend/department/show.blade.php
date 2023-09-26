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
                                    <label for="exampleInputEmail1">Title </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value=" {{ $data->title }}">
                                  </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Details </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" disabled value="  {{ $data->details }}">
                                  </div>

                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
