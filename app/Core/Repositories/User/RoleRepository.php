<?php

namespace App\Core\Repositories\User;

use App\Core\Models\Role;
use App\Core\Repositories\AbstractRepository;

class RoleRepository extends AbstractRepository
{
    public function __construct(Role $model)
    {
        $this->model = $model;

        parent::__construct($model);
    }
}