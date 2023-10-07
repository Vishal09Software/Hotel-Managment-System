@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $data->customer->full_name }}</h4>
                            <a href="{{ url('/booking') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            <div class="card-body">
                                <form class="forms-sample">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1"
                                            placeholder="Username" disabled value=" {{ $data->customer->full_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Room No </label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Email" disabled value=" {{ $data->room->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Checkin Date </label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Email" disabled value=" {{ $data->checkin_date }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Checkout Date </label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Email" disabled value=" {{ $data->checkout_date }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Checkout Date </label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Email" disabled value=" {{ $data->total_adults }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Checkout Date </label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Email" disabled value=" {{ $data->total_children }}">
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
