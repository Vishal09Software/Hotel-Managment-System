@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bookings Room Table</h4>
                            <a href="{{ url('/booking/create') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">Add New</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Mobile
                                            </th>
                                            <th>
                                                Images
                                            </th>
                                            <th>
                                                Action
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data)
                                            @foreach ($data as $booking)
                                                <tr>
                                                    <td class="py-1">
                                                        {{ $booking->id }}
                                                    </td>
                                                    <td>
                                                        {{ $booking->full_name }}
                                                    </td>

                                                    <td>
                                                        {{ $booking->email }}
                                                    </td>

                                                    <td>
                                                        {{ $booking->mobile }}
                                                    </td>

                                                    <td>
                                                        <img src="{{ asset('backend/images/booking/' . $booking->images) }}" alt="img" width="50px" height="50px">

                                                    </td>

                                                    <td>
                                                        <a href="{{ url('/booking/' . $booking->id) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{ url('/booking/' . $booking->id . '/edit') }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{ url('/booking/' . $booking->id . '/delete') }}"
                                                            class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
