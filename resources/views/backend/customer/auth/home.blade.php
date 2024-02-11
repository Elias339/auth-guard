<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>customer home</title>
</head>
<body>

    <form action="{{ route('customer.logout') }}" method="post" id="logout-form">
    @csrf
    <button type="submit">LogOut</button>
    </form>

</body>
</html>
