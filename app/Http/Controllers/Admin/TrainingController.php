<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    /*private $foodService;

    public function __construct(FoodService $foodService)
    {
        $this->foodService = $foodService;
    }*/

    public function index($clientId)
    {
        //$foods = $this->foodService->getFoods($clientId);

        $trainings = [];
        return view('admin.trainings.index', compact('trainings', 'clientId'));
    }

    public function edit($clientId, $day)
    {
        /*$food = $this->foodService->getFood($clientId, $day);

        if(empty($food)) {
            $food = new Food();
            $food->day = $day;
        }*/

        $training = null;

        return view('admin.trainings.edit', compact('clientId', 'training'));
    }
}