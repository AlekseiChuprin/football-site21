<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Models\Category;

class SearchController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * SearchController constructor.
     * @param Category $category, Post $post
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the search posts.
     */
    public function search(SearchService $searchService, Request $request)
    {
        $posts = $searchService->search($request->input('search'));
        $categories = $this->category->get();

        return view('front.search', ['categories' => $categories, 'posts' => $posts]);

    }
}
