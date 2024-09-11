<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Welcome {{ Session::get('user') -> name }} to custom Auth Page</h1>

        <a href="{{ route('custom_auth.logout') }}">Logout</a>

    </div>
</body>

</html>