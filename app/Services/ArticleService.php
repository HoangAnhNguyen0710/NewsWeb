<?php

namespace App\Services;

use App\Http\Requests\StoreArticleRequest;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleService {

    // protected ArticleRepository $articleRepository;


    public function __construct()
    {
        $this->articleRepository = app(ArticleRepository::class);
        
    }

    public function store(StoreArticleRequest $request) {
        $requestData = $request->only([
            'id',
            'title',
            'content',
            'display_num',
            'creator_id',
            'category_id'
        ]);
       
        if(array_key_exists('id', $requestData)) {
            $id = $requestData['id'];
            $requestData = $request->only([
                'title',
                'content',
                'display_num',
                'category_id',
                'display',
            ]);
            return $this->articleRepository->updateArticle($id, $requestData);
        }
        else {
            $requestData =  array_merge($requestData, ['display' => false]);
            return $this->articleRepository->createOrUpdate($requestData);
        }
        
    }

    public function getOneArticle($id) {
        return $this->articleRepository->getOne((int)$id);
    }

    public function getListOfArticles($page, $items_per_page, $category_id) {
        $pageNum = (int)$page;
        $itemsPerPage = (int)$items_per_page;
        if($category_id != null) {
            $category_id = (int)$category_id;
            return $this->articleRepository->getListOfArticlesByCategory($pageNum, $itemsPerPage, $category_id);
        }
        else
        return $this->articleRepository->getListOfArticles($pageNum, $itemsPerPage);
    }
}

?>