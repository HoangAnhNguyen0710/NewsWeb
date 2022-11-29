<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->articleService = app(ArticleService::class);
        $this->categoryService = app(CategoryService::class);
    }
    public function index() {
        $pageNumber = 1;
        $items_per_page = 5;
        $cat_list = $this->categoryService->getListOfCategories();
        foreach($cat_list as $offset => $category) {
            $listArticles = $this->articleService->getListOfArticles($pageNumber, $items_per_page, $category["id"]);
            $cat_list[$offset]['listArticles'] = $listArticles;
        }
  
        return view('home', compact('cat_list'));
    }
}
