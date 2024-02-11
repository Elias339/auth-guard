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
    <title>Customer Registration</title>
</head>
<body>

<div class="registration-container">
    <div class="registration-form">
        <h2>Customer Registration</h2>
        <form action="{{ route('customer.create') }}" method="post" autocomplete="off" enctype="multipart/form-data">

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
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter your phone">
            </div>
            <div class="form-group">
                <label for="profile">Profile:</label>
                <input type="file" name="profile" id="profile">
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Enter your latitude">
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Enter your longitude">
            </div>
            <button type="submit" class="btn btn-success btn-register">Register</button>
            <br>
            <a href="{{ route('customer.login') }}">I already have an account</a>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
