@extends('frontend.layouts.main')
@section('main-container')
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{ url('frontend/img/slider/3.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right caption mt-90">
                    <span>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                    </span>
                    <h5>The Cappa Luxury Hotel</h5>
                    <h1>Rooms & Suites</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms 3 -->
    <div class="rooms3 section-padding">
        <div class="container">
            <div class="row">
                @foreach ($roomsTypes as $roomsType)
                <div class="col-md-4">
                    <div class="square-flip">
                        @foreach ($roomsType->roomtypeimages as $rtypes)
                        <div class="square bg-img" data-background="{{ asset($rtypes->images) }}">
                            @endforeach
                            {{-- <span class="category"><a href="rooms2.html">Book</a></span> --}}
                            <div class="square-container d-flex align-items-end justify-content-end">
                                <div class="box-title">
                                    <h6>{{ $roomsType->price }}Rs. / Night</h6>
                                    <h4>{{ $roomsType->title }}</h4>
                                </div>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>
                        <div class="square2">
                            <div class="square-container2">
                                <h6>{{ $roomsType->price }}Rs. / Night</h6>
                                <h4>{{ $roomsType->title }}</h4>
                                <p>Hotel viverra tristique ustoni miss vitae sediam neque nivamus aestan.</p>
                                <div class="row room-facilities mb-30">
                                    <div class="col-md-6">
                                        <ul>
                                            <li><i class="flaticon-group"></i> 1-2 Persons</li>
                                            <li><i class="flaticon-wifi"></i> Free Wifi</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                           <li><i class="flaticon-bed"></i> Twin Bed</li>
                                           <li><i class="flaticon-breakfast"></i> Breakfast</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btn-line"><a href="{{ '/room-details/' . $roomsType->id }}">Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>

    </div>
   @endsection
