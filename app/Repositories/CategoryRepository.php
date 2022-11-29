<?php

namespace App\Repositories;

use App\Models\Categories;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductRepository.
 *
 * @package namespace App\Repositories;
 */
class CategoryRepository extends BaseRepository {
    public function model() {
        return Categories::class;
    }

    public function getOne($id) {
        $result = $this->model->query()->find($id);
        if($result != null) {
            return $result->toArray();
        }
        else return null;
   
    }

    public function getListOfCategories() {
        return $this->model->all()->toArray();
    }

}

