<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\FoodService;
use App\Http\Controllers\Controller;

class FoodsController extends Controller
{
    private $foodService;

    public function __construct(FoodService $foodService)
    {
        $this->foodService = $foodService;
    }

    public function index()
    {
        $exercises = $this->foodService->getExercises();

        return view('admin.exercises.index', compact('exercises'));
    }
}