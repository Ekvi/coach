<?php

namespace App\Http\Controllers\Api\v1;

use App\Core\Services\User\ClientService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClientRequest;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;

        //Guard::auth();
    }

    public function index()
    {
        echo 'api index';
    }

    public function test()
    {
        echo 'api test';
    }

    public function create(CreateClientRequest $request)
    {
        $data = $request->json()->all();
        /*Log::debug($data);
        Log::info($data);
        Log::error($data);*/

        $client = $this->clientService->create($data['deviceId'], $data['email']);

        return response()->json(['id' => $client->id, 'accessToken' => $client->accessToken]);
    }
}