<?php

namespace App\Services;

use App\Http\Requests\LikeRequest;
use App\Repositories\LikeRepository;
use Illuminate\Http\Request;

class LikeService {

    // protected ArticleRepository $articleRepository;


    public function __construct()
    {
        $this->likeRepository = app(LikeRepository::class);
        
    }

    public function likeOrUnlike(Request $request) {
        $requestData = $request->only([
            'user_id',
            'article_id'
        ]);

        return $this->likeRepository->createOrDeleteLike($requestData);
    }

    public function getLikeList($article_id) {
        return $this->likeRepository->getLikeList($article_id);
    }

    public function checkLikedOrNot($user_id, $article_id) {
        return $this->likeRepository->checkLikedOrNot($user_id, $article_id);
    }

    public function getLikeNum($article_id) {
        return $this->likeRepository->getLikeNum($article_id);
    }
}

?>