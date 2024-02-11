<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .registration-container {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
        }

        .registration-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .registration-form h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-register {
            background-color: #28a745;
            color: #ffffff;
        }
    </style>

    <title>Seller Registration</title>
</head>
<body>

<div class="registration-container">
    <div class="registration-form">
        <h2>Seller Register</h2>
        <form action="{{ route('seller.create') }}" method="post" autocomplete="off" enctype="multipart/form-data">

                @if(Session::get('success'))
                <div class="alert alert-danger">
                    {{ Session::get('success') }}
                </div>
                @endif
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

            @csrf
            <div class="form-group">
                <label for="name">Username*:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="email">Email*:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="password">Password*:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password*:</label>
                <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password">
                <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="phone">phone:</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone">
                <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Enter your latitude">
                <span class="text-danger">@error('latitude'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Enter your longitude">
                <span class="text-danger">@error('longitude'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="kyc_img">KYC Image : </label>
                <input type="file" name="kyc_img" id="kyc_img">
            </div>
            <div class="form-group">
                <label for="kyc_number">KYC Number:</label>
                <input type="number" class="form-control" name="kyc_number" id="kyc_number" placeholder="Enter your kyc number">
                <span class="text-danger">@error('longitude'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="restaurant_name">Restaurant Name:</label>
                <input type="text" class="form-control" name="restaurant_name" id="restaurant_name" placeholder="Enter your kyc restaurant name">
                <span class="text-danger">@error('restaurant_name'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter your restaurant address">
                <span class="text-danger">@error('address'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="restaurant_profile">Restaurant Profile : </label>
                <input type="file" name="restaurant_profile" id="restaurant_profile">
            </div>
            <div class="form-group">
                <label for="restaurant_banner">Restaurant Banner : </label>
                <input type="file" name="restaurant_banner" id="restaurant_banner">
            </div>

            <div class="form-group">
                <label for="restaurant_email">Restaurant Email:</label>
                <input type="email" class="form-control" name="restaurant_email" id="restaurant_email" placeholder="Enter your restaurant email">
                <span class="text-danger">@error('restaurant_email'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="restaurant_phone">Restaurant Phone:</label>
                <input type="tel" class="form-control" name="restaurant_phone" id="restaurant_phone" placeholder="Enter your restaurant phone">
                <span class="text-danger">@error('restaurant_phone'){{ $message }} @enderror</span>
            </div>

            <button type="submit" class="btn btn-success btn-register">Register</button>
            <br>
            <a href="{{ route('seller.login') }}">I already have an account</a>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
