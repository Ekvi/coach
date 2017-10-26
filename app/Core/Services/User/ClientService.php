<?php

namespace App\Core\Services\User;

use App\Core\Models\Profile;
use App\Core\Models\User;
use App\Core\Repositories\User\ProfileRepository;
use App\Core\Repositories\User\UserRepository;
use App\Core\Repositories\User\RoleRepository;
use Illuminate\Support\Facades\DB;

class ClientService
{
    private $userRepository;
    private $roleRepository;
    private $profileRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository,
                                ProfileRepository $profileRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->profileRepository = $profileRepository;
    }

    public function create($deviceId, $email = '')
    {
        $oldClient = $this->getClient($deviceId);
        if(!empty($oldClient)) {
            return $oldClient;
        }

        $client = null;

        DB::transaction(function() use ($deviceId, $email) {
            $client = User::createClient($deviceId, $email);
            $this->userRepository->save($client);

            $profile = Profile::createDefault($client->id);
            $this->profileRepository->save($profile);
        });

        print_r($client);
        //return $client;
    }

    public function getClient($deviceId)
    {
        return $this->userRepository->one('*', ['deviceId' => $deviceId]);
    }

    public function getClients()
    {
        $role = $this->roleRepository->column('id', ['name' => 'client']);

        return $this->userRepository->getClientsWithProfile(['roleId' => $role[0]]);
    }
}