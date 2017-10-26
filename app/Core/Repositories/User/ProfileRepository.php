<?php

namespace App\Core\Repositories\User;

use App\Core\Models\Profile;
use App\Core\Repositories\AbstractRepository;

class ProfileRepository extends AbstractRepository
{
    public function __construct(Profile $model)
    {
        $this->model = $model;

        parent::__construct($model);
    }
}