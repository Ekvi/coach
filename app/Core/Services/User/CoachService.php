<?php

namespace App\Core\Services\User;

use App\Core\Models\User;
use App\Core\Repositories\User\RoleRepository;
use App\Core\Repositories\User\UserRepository;

class CoachService
{
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function getCoaches()
    {
        $role = $this->roleRepository->column('id', ['name' => 'coach']);

        return $this->userRepository->get('*', ['roleId' => $role[0]]);
    }

    public function deleteCoach($id)
    {
        return $this->userRepository->delete($id);
    }

    private function getCoach($id): User
    {
        return $this->userRepository->one('*', ['id' => $id]);
    }

    public function changePassword($id, $password)
    {
        $coach = $this->getCoach($id);
        $coach->changePassword($password);

        return $this->userRepository->update($coach);
    }
}