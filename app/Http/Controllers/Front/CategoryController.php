<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * @var Post
     */
    private $post;

    /**
     * CategoryController constructor.
     * @param Category $category, Post $post
     */
    public function __construct(Category $category, Post $post)
    {
        $this->category = $category;
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     */
    public function view($slug)
    {
        $category = $this->category->where('slug', $slug)->firstOrFail();
        $categories = $this->category->get();
        $posts = $this->post->with('category')->orderBy('id', 'desc')->paginate(3);
        $postsCategory = $category->posts()->orderBy('id', 'desc')->paginate(3);

        return view('front.posts-category', compact('categories', 'posts', 'postsCategory'));
    }
}
