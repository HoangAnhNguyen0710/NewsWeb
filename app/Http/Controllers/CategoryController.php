<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->articleService = app(ArticleService::class);
        $this->categoryService = app(CategoryService::class);
    }
    public function index(Request $request, $category_id) {
        if($request->only('page'))
            $pageNum = $request->only('page')['page'];
            else $pageNum = 1;
            
        if($request->only('items_per_page'))
            $itemsPerPage = $request->only('items_per_page')['items_per_page'];
            else $itemsPerPage = 5;
            
        $category = $this->categoryService->getCategory((int)$category_id);
        $list = $this->articleService->getListOfArticles($pageNum,  $itemsPerPage, (int)$category_id);
    
        $cat_list = $this->categoryService->getListOfCategories();
        return view('blog-category', compact('cat_list', 'list', 'category'));
    }
}
