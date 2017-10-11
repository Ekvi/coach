<?php

namespace App\Core\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements Repository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get($select = '*', $where = false, $take = false, $paginate = false)
    {
        return $this->model->get();
    }

    public function one($field = '', $where = false, $select = '*')
    {
        $query = $this->model->select($select);

        if($where) {
            $query->where($field, $where);
        }

        echo "<pre>";
        print_r($query);
        echo "<pre>";
        //return $query->first();
    }

    public function save(Model $model)
    {
        return $model->save();
    }

    public function update(Model $model)
    {
        return $model->update();
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}