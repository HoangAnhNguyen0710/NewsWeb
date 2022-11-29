<?php

namespace App\Repositories;

use App\Models\Like;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductRepository.
 *
 * @package namespace App\Repositories;
 */
class LikeRepository extends BaseRepository {
    public function model() {
        return Like::class;
    }

    public function createOrDeleteLike($data) {
        $search = $this->model->where('user_id', $data['user_id'])->where('article_id', $data['article_id'])->first();
        if($search == null) {
            return $this->model->query()->upsert($data, 'id');
        }
        else {
                return $this->model->where('id', $search->only('id'))->delete();    
           
        }
    }

    public function getLikeList($id) {
    
        $result = $this->model->with('user')->where('article_id', (int)$id)->get()->toArray();
        return $result;
    }

    public function checkLikedOrNot($user_id, $article_id) {
        $checked = $this->model->where('article_id', $article_id)->where('user_id', $user_id)->get()->toArray();
        if(count($checked) == 0) {
            return false;
        } 
        else return true;
    }

    public function getLikeNum($id) {
    
        $result = $this->model->with('user')->where('article_id', (int)$id)->get()->count();
        return $result;
    }
}

