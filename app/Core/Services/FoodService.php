<?php

namespace App\Core\Services;

use App\Core\Repositories\FoodRepository;

class FoodService
{
    private $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }
}