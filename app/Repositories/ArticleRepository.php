<?php

namespace App\Repositories;

use App\Models\Article;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductRepository.
 *
 * @package namespace App\Repositories;
 */
class ArticleRepository extends BaseRepository {
    public function model() {
        return Article::class;
    }

    public function createOrUpdate($data) {
        return $this->model->query()->upsert($data, 'id');
    }

    public function updateArticle($id, $data) {
        return $this->model->query()->where('id', $id)->update($data);
    }

    public function getOne($id) {
        if(auth()->user() && auth()->user()->role == "admin") {
            $result = $this->model->query()->with('user', 'category')->find($id);
        }
        else 
        $result = $this->model->query()->where('display', 1)->with('user', 'category')->find($id);
        if($result != null) {
            return $result->toArray();
        }
        else return null;
   
    }

    public function getListOfArticles($page, $per_page = null) {
        $result = $this->model->orderBy('display_num', 'asc')->with('user', 'category')->paginate($per_page, ['*'], 'page', $page);
        return $result;
    }

    public function getListOfArticlesByCategory($page, $per_page, $category_id) {
        $result = $this->model->where('category_id', (int)$category_id)->where('display', 1)->orderBy('display_num', 'asc')->with('user', 'category')->paginate($per_page, ['*'], 'page', $page);
        return $result;
    }
}

