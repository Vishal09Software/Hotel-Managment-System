@extends('frontend.layouts.main')
@section('main-container')
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{ url('frontend/img/slider/3.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h5>Discover</h5>
                    <h1>Our Services</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Services -->
    <section class="services section-padding">
        <div class="container">
            @foreach ($services as $service)
            <div class="row mt-3" >
                <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                    <div class="img left">
                        <a href="{{url('service-details/'.$service->id)}}"><img src="{{ asset('backend/images/services/' . $service->images) }}"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-md-6 p-0 bg-cream valign animate-box" data-animate-effect="fadeInRight">
                    <div class="content">
                        <div class="cont text-left">
                            <h4>{{ $service->title }}</h4>
                            <p>{{ $service->small_desc }}</p>
                            <div class="butn-dark"> <a href="{{url('service-details/'.$service->id)}}"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
  @endsection
