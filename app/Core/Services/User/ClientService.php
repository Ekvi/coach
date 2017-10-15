<?php

namespace App\Core\Services\User;

use App\Core\Repositories\User\UserRepository;
use App\Core\Repositories\User\RoleRepository;

class ClientService
{
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function getClients()
    {
        $role = $this->roleRepository->column('id', ['name' => 'client']);

        return $this->userRepository->get('*', ['roleId' => $role[0]]);
    }
}