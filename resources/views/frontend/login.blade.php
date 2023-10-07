<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Cappa Luxury Hotel</title>
    <link rel="shortcut icon" href="{{ url('frontend/img/favicon.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet"
        href="{{ url('frontend/auth/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ url('frontend/auth/css/style.css') }}">

    <style>
        .image-holder {
            background-image: url('frontend/auth/images/registration-form-7.jpg');
            background-repeat: no-repeat;
        }

        .form-inner {
            background: #aa8453;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="image-holder">
            <img src="{{ url('frontend/auth/images/registration-form-7.jpg') }}" alt="">
        </div>
        <div class="form-inner">

            <form action="{{ url('customer/login') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-header">
                    <h3>Sign in</h3>
                    <img src="{{ url('frontend/auth/images/sign-up.png') }}" alt="" class="sign-up-icon">
                </div>
                @if (session('error'))
                    <h6 class="alert alert-success">{{ session('error') }}</h6>
                @endif
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit">Sign Up</button>

            </form>
        </div>

    </div>

    <script src="{{ url('frontend/auth/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('frontend/auth/js/jquery.form-validator.min.js') }}"></script>
    <script src="{{ url('frontend/auth/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
