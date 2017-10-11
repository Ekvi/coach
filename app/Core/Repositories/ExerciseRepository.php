<?php

namespace App\Core\Repositories;

use App\Core\Models\Exercise;

class ExerciseRepository extends AbstractRepository
{
    public function __construct(Exercise $model)
    {
        $this->model = $model;

        parent::__construct($model);
    }
}