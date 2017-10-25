<?php

namespace App\Core\Services;

use App\Core\Models\Food;
use App\Core\Repositories\FoodRepository;

class FoodService
{
    private $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    public function getFoods($clientId)
    {
        return $this->foodRepository->getByClientIdWithIndexBy($clientId);
    }

    public function getFood($clientId, $day)
    {
        $where = ['clientId' => $clientId, 'day' => $day];

        return $this->foodRepository->one('*', $where);
    }

    public function updateOrCreate($clientId, $day, $content)
    {
        /** @var $food \App\Core\Models\Food */
        $food = $this->getFood($clientId, $day);

        if(empty($food)) {
            $food = Food::create($clientId, $day, $content);
            //$this->foodRepository->save($food);
        } else {
            $food->change($content);
            //$this->foodRepository->update($food);
        }
        $this->foodRepository->save($food);
    }
}