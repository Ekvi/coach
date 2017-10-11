<?php

namespace App\Core\Repositories;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function get($select = '*', $where = false, $take = false, $paginate = false);

    public function one($select = '*', $where = false);

    public function save(Model $model);

    public function update(Model $model);

    public function delete($id);
}