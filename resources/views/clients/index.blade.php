<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8"> -->
    <title>Clients</title>
</head>

<body>
    <h1>Clients</h1>

    <ul>
        @forelse ($clients as $client)
        <li>
            <a href="{{ $client->path() }}">{{ $client->name }}</a>
        </li>
        @empty
        <h2>No Clients Yet :'(</h2>
        @endforelse
    </ul>
</body>

</html>
