<?php

namespace App\Http\Controllers\Api\v1;

use App\Core\Services\FoodService;
use App\Http\Controllers\Controller;

class FoodsController extends Controller
{
    private $foodService;

    public function __construct(FoodService $foodService)
    {
        $this->foodService = $foodService;
    }

    public function getByClientId($clientId)
    {
        $food = $this->foodService->getFoods($clientId);

        /*if(empty($food->items)) {
            $food = new \stdClass();
        }

        return response()->json($food);*/

        /*foreach($food as $item) {
            if(!empty($item->createdAt)) {
                echo $item->createdAt . "\n";
            }
        }
        print_r($food);*/
        return response()->json($food);
    }
}