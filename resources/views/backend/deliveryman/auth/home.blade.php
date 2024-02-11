<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveryman home</title>
</head>
<body>

    <h1>Deliveryman Dashboard</h1>

    <form action="{{ route('deliveryman.logout') }}" method="post" id="logout-form">
    @csrf
    <button type="submit">LogOut</button>
    </form>
</body>
</html>
