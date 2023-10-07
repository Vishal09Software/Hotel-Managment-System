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
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            <form action="{{ url('admin/customers') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-header">
                    <h3>Sign in</h3>
                    <img src="{{ url('frontend/auth/images/sign-up.png') }}" alt="" class="sign-up-icon">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="full_name">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="tel" class="form-control " name="mobile">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">User Profile</label>
                    <input type="file" class="form-control" name="images">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="ref" value="front">
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
