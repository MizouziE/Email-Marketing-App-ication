<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
</head>

<body>
    <h1>{{ $client->name }}</h1>
    <div>{{ $client->email }}</div>
    <div>{{ $client->phone }}</div>
    <div>{{ $client->date_of_birth }}</div>
</body>

</html>
