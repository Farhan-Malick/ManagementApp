<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create the client
        Client::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('Clientsuccess', 'Client created successfully.');
    }
}
