<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\Services\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->likeService = app(LikeService::class);
    }

    public function likeOrUnlike(Request $request) {
        try{
            $this->likeService->likeOrUnlike($request);

            return response()->json([
                'status' => 'SUCCESS',
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

    public function getLikeNum($article_id) {
        return $this->likeService->getLikeNum($article_id);
    }
}
