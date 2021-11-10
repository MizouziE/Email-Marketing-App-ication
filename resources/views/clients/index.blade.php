<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8"> -->
    <title>Document</title>
</head>

<body>
    <h1>Clients</h1>

    <ul>
        @foreach ($clients as $client)
        <li>{{ $client->name }}</li>
        @endforeach
    </ul>
</body>

</html>
