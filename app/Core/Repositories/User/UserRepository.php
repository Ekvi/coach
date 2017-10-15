<?php

namespace App\Core\Repositories\User;

use App\Core\Models\User;
use App\Core\Repositories\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;

        parent::__construct($model);
    }
}