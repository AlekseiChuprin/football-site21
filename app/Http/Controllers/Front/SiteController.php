<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * @var Post
     */
    private $post;

    /**
     * @var Category
     */
    private $cateory;

    /**
     * @var Tag
     */
    private $tag;

    /**
     * SiteController constructor.
     * @param Post $post, Category $category
     */
    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->with('category')->orderBy('id', 'desc')->paginate(3);
        $mainPosts = $this->post->where('is_main', 1)->get();
        $categories = $this->category->get();

        return view('front.index', compact('posts', 'mainPosts', 'categories'));
    }

    /**
     * Display posts of the category
     */
    public function view($slug)
    {
        $post = $this->post->where('slug', $slug)->firstOrFail();
        $post->views += 1;
        $post->update();
        $posts = $this->post->with('category')->orderBy('id', 'desc')->paginate(3);
        $categories = $this->category->get();

        return view('front.post', compact('post', 'posts', 'categories'));
    }
}
