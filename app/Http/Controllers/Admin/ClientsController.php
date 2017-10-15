<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\User\ClientService;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->clientService->getClients();

        return view('admin.clients.index', compact('clients'));
    }
}