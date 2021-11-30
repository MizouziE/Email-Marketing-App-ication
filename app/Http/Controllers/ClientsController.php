<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientsController extends Controller
{
    public function index(Client $client)
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    public function store(Client $client)
    {
        //validate
        $clientInfo = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $clientInfo['provider_id'] = auth()->id();

        //persist
        Client::create($clientInfo);

        //redirect
        return redirect('/clients');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }
}
