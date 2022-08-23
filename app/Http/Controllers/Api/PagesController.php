<?php

namespace App\Http\Controllers\Api;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Http\Resources\Api\PagesResource;
use App\Http\Resources\SimplePageResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        if ($request->filled('sort')) {
            $pages = Page::orderByDesc($request->get('sort'))->get();
        } else {
            $pages = Page::all();
        }

        return SimplePageResource::collection($pages);
    }

    /**
     * @param Page $page
     * @return PageResource
     */
    public function show(Page $page): PageResource
    {
        return new PageResource($page);
    }

    /**
     * @param Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function addView(Page $page): JsonResponse
    {
        $page->increment('views');

        return response()->json([
            'message' => 'ok',
        ]);
    }
}
