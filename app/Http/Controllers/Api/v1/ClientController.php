<?php

namespace App\Http\Controllers\Api\v1;

use App\Core\Services\User\ClientService;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function create(Request $request)
    {
        //echo 'api create';

        $data = $request->json()->all();
        /*Log::debug($data);
        Log::info($data);
        Log::error($data);*/

        $client = $this->clientService->create($data['deviceId'], $data['email']);

        return response()->json(['id' => $client->id, 'accessToken' => $client->accessToken]);
    }
}