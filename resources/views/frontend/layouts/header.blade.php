<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>The Cappa Luxury Hotel</title>
    <link rel="shortcut icon" href="{{ url('frontend/img/favicon.png') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Barlow&amp;family=Barlow+Condensed&amp;family=Gilda+Display&amp;display=swap">
    <link rel="stylesheet" href="{{ url('frontend/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper">
                <a class="logo" href="{{ url('/') }}"> <img src="{{ url('frontend/img/logo.png') }}"
                        class="logo-img" alt=""> </a>
            </div>
            <!-- Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown"> <a class="nav-link active dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                            aria-expanded="false">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Rooms & Suites
                            <i class="ti-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            @foreach ($roomsTypes as $roomsType)
                                <li><a href="rooms.html" class="dropdown-item"><span>{{$roomsType->title}}</span></a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="facilities.html">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link" href="news.html">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>

                    @if (Session::has('customerlogin'))
                    <li class="nav-item"><a class="nav-link" href="{{url('/logout')}}">logout</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/register')}}">Register</a></li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
