<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientsController extends Controller
{
    public function index(Client $client)
    {
        $clients = auth()->user()->clients;

        return view('clients.index', compact('clients'));
    }

    public function store(Client $client)
    {
        $clientInfo = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        auth()->user()->clients()->create($clientInfo);

        return redirect('/clients');
    }

    public function show(Client $client)
    {
        if (auth()->user()->isNot($client->provider)) {
            abort(403);
        }

        return view('clients.show', compact('client'));
    }

    public function create()
    {
        return view('clients.create');
    }
}
