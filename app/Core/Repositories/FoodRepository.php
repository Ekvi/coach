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

    public function getByClientIdWithIndexBy($clientId)
    {
        //$this->model->find()->where(['clientId' => $clientId])->indexBy('day')->asArray()->all();
        return $this->model->where(['clientId' => $clientId])->get()->keyBy('day');//->getDictionary();

        //dd($data);
        //return $this->model->find()->where(['clientId' => $clientId])->indexBy('day')->asArray()->all();
    }
}