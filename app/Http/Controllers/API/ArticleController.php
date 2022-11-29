<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\LikeService;
use Exception;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->articleService = app(ArticleService::class);
        $this->categoryService = app(CategoryService::class);
        $this->likeService = app(LikeService::class);
    }

    public function index() {
        $cat_list = $this->categoryService->getListOfCategories();
        return view('postArticle', compact('cat_list'));
    }

    public function update($id) {
        if(auth()->user()->role == "admin") {
            $cat_list = $this->categoryService->getListOfCategories();
            $article = $this->articleService->getOneArticle($id);
            return view('updateArticle', compact('cat_list', 'article'));
        }
    }

    public function getOneArticle($id) {
        $cat_list = $this->categoryService->getListOfCategories();
        $article = $this->articleService->getOneArticle($id);
        $like_list = $this->likeService->getLikeList($id);
        $like_num = count($like_list);
        if(auth()->user()) {
            $liked = $this->likeService->checkLikedOrNot(auth()->user()->id, $article['id']);
        } else $liked = false;
        return view('articleDetail', compact('cat_list', 'article', 'like_list', 'like_num', 'liked'));
    }

    public function getArticleList(Request $request) {
        
        $pageNum = $request->only('page')['page'];
        $itemsPerPage = $request->only('items_per_page')['items_per_page'];
        $categoryId = $request->has('category_id');
        if($categoryId) {
        $categoryId = $request->only('category_id')['category_id']; 
        }
        else $categoryId = null;
        try{
           $list = $this->articleService->getListOfArticles($pageNum, $itemsPerPage, $categoryId);
            return response()->json(['status' => 200, 'data' => $list]); 
        }
        catch(\Exception $e) {
            return response()->json(['status' => 400, 'data' => []]);
        }
    }

    public function postArticle(StoreArticleRequest $request) {
        try{
            $this->articleService->store($request);

            return response()->json([
                'status' => 'Đăng bài thành công!',
                'data' => []
            ]);
        } catch(\Exception $e) {
            dd($e);
            return response()->json([
                'status' => 'FAIL',
                'data' => []
            ]);
        }
    
    }
    
}
