<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;

class TagController extends Controller
{
    /**
     * @var Tag
     */
    private $tag;

    /**
     * @var Category
     */
    private $category;

    /**
     * SiteController constructor.
     * @param Tag $tag, Post $post, Category $category
     */
    public function __construct(Tag $tag, Category $category, Post $post)
    {
        $this->tag = $tag;
        $this->category = $category;
        $this->post = $post;

    }

    /**
     * Display posts by tags.
     * @return \Illuminate\Http\Response
     */
    public function view($slug)
    {
        $tag = $this->tag->where('slug', $slug)->firstOrFail();
        $categories = $this->category->get();
        $posts = $this->post->with('category')->orderBy('id', 'desc')->paginate(3);
        $postsTegs = $tag->posts()->orderBy('id', 'desc')->paginate(3);

        return view('front.posts-tag', compact('categories', 'postsTegs', 'posts'));

    }
}
