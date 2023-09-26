@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$staff->full_name}} Payments</h4>
                            <a href="{{ url('/staff/payment/' . $staff_id . '/add') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">Add New Payment</button>
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
                                                Amount
                                            </th>

                                            <th>
                                                Payment Date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data)
                                            @foreach ($data as $payment)
                                                <tr>
                                                    <td class="py-1">
                                                        {{ $payment->id }}
                                                    </td>
                                                    <td>
                                                        {{ $payment->amount }}
                                                    </td>

                                                    <td>
                                                        {{ $payment->payment_date }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/staff/payment/' . $payment->id . '/' .$staff_id. '/delete') }}"
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
