<?php

namespace App\Core\Repositories;

use App\Core\Models\Food;

class FoodRepository extends AbstractRepository
{
    public function __construct(Food $model)
    {
        $this->model = $model;

        parent::__construct($model);
    }
}