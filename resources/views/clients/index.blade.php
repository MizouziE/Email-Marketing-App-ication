@extends ('layouts.app')

@section('content')
<div style="display: flex; align-items: center;">
    <h1 style="margin-right: auto;">Clients</h1>
    <a href="/clients/create">Add new client</a>
</div>

<ul>
    @forelse ($clients as $client)
    <li>
        <a href="{{ $client->path() }}">{{ $client->name }}</a>
    </li>
    @empty
    <h2>No Clients Yet :'(</h2>
    @endforelse
</ul>
@endsection
