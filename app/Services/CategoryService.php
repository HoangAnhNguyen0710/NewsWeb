<?php

namespace App\Services;

use App\Http\Requests\StoreArticleRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService {

    // protected ArticleRepository $articleRepository;

    public function __construct()
    {
        $this->categoryRepository = app(CategoryRepository::class);
        
    }

    public function getListOfCategories() {
        return $this->categoryRepository->getListOfCategories();
    }

    public function getCategory($category_id) {
        return $this->categoryRepository->getOne($category_id);
    }
}

?>