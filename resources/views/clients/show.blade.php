@extends ('layouts.app')

@section('content')
<h1>{{ $client->name }}</h1>
<div>{{ $client->email }}</div>
<div>{{ $client->phone }}</div>
<div>{{ $client->date_of_birth }}</div>
<a href="/clients">Go Back</a>
@endsection
