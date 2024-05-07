<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($user as $users)
        <h1>{{ $users->name }}</h1>
    @endforeach
    <h1>rhyfdj</h1>
</body>

</html>
