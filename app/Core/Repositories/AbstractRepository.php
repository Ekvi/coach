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

    public function get($select = '*', $where = [], $take = false, $paginate = false)
    {
        $query = $this->model->select($select);

        if(!empty($where)) {
            $query = $query->where($where);
        }

        return $query->get();
    }

    public function one($select = '*', $where = [])
    {
        $query = $this->model->select($select);

        if($where) {
            $query = $query->where($where);
        }

        return $query->first();
    }

    public function column($column, $where = [])
    {
        $query = $this->model;

        if(!empty($where)) {
            $query = $query->where($where);
        }

        return $query->pluck($column)->all();
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