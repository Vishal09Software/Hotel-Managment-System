@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Booking </h4>
                            <a href="{{ url('/booking') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{ url('/booking') }}" method="post" enctype="multipart/form-data"
                                class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="">Customers </label>
                                    <select class="form-control" name="customer_id" id="">
                                        <option disabled selected>Customer Select</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="color: red">
                                    @error('customer_id')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Checkin date</label>
                                    <input type="date" name="checkin_date" class="form-control checkin-date">
                                </div>
                                <div style="color: red">
                                    @error('checkin_date')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Checkout Date</label>
                                    <input type="date" name="checkout_date" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('checkout_date')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Aviables Rooms </label>
                                    <select class="form-control room-list" name="room_id" id="">

                                    </select>
                                </div>
                                <div style="color: red">
                                    @error('room_id')
                                        {{ $message }}
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputUsername1">Adults</label>
                                    <input type="number" name="total_adults" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('total_adults')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Children</label>
                                    <input type="number" name="total_children" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('total_children')
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

    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".checkin-date").on('blur',function(){
                var _checkindate = $(this).val();
                $.ajax({
                    url : "{{url('booking')}}/avilable-rooms/" +_checkindate,
                    dataType: 'json',
                    beforeSend:function(){
                        $(".room-list").html('<option>----Loading----</option>');

                    },
                    success: function(res){
                        var _html = '';
                        $.each(res.data,function(index,row){
                            _html += '<option value="'+row.id+'">'+row.title+'</option>';
                        });

                        $(".room-list").html(_html);
                    }

                })
            });
        });
    </script>
@endsection
@endsection
