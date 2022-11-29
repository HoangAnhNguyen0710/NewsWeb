<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->categoryService = app(CategoryService::class);
        $this->articleService = app(ArticleService::class);
    }

    public function index(Request $request) {
        if(auth()->user()->role == "admin") {
            if($request->only('page'))
            $pageNum = $request->only('page')['page'];
            else $pageNum = 1;
            
            if($request->only('items_per_page'))
            $itemsPerPage = $request->only('items_per_page')['items_per_page'];
            else $itemsPerPage = 5;
            $list = $this->articleService->getListOfArticles($pageNum, $itemsPerPage, null);
            $cat_list = $this->categoryService->getListOfCategories();
            return view('management', compact('list', 'cat_list'));
        }
        else return redirect()->route('home');
    }
}
