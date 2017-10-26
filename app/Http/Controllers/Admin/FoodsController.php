<?php

namespace App\Http\Controllers\Admin;

use App\Core\Models\Food;
use App\Core\Services\FoodService;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditFoodRequest;

class FoodsController extends Controller
{
    private $foodService;

    public function __construct(FoodService $foodService)
    {
        $this->foodService = $foodService;
    }

    public function index($clientId)
    {
        $foods = $this->foodService->getFoods($clientId);

        return view('admin.foods.index', compact('foods', 'clientId'));
    }

    public function edit($clientId, $day)
    {
        $food = $this->foodService->getFood($clientId, $day);

        if(empty($food)) {
            $food = new Food();
            $food->day = $day;
        }

        return view('admin.foods.edit', compact('clientId', 'food'));
    }

    public function update(EditFoodRequest $request, $clientId, $day)
    {
        $this->foodService->updateOrCreate($clientId, $day, $request->input('content'));

        return redirect()->route('food', ['clientId' => $clientId]);
    }
}