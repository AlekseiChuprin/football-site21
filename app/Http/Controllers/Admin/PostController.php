<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
     * CategoryController constructor.
     * @param Post $post, Category $category, Tag $tag
     */
    public function __construct(Post $post, Category $category, Tag $tag)
    {
        $this->post = $post;
        $this->cateory = $category;
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->with('category', 'tags')->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->cateory->pluck('title', 'id');
        $tags = $this->tag->pluck('title', 'id');

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $params = $request->all();
        $params['image'] = $this->post->uploadImage($request);
//      images/2021-02-20/FtODKoRa1CBU3Y9FVp7UAgrIJJu0MZRl8rOwPRXT.jpg
//        Image::make(request()->file('uploaded_file'))->resize(300, 200)->save('foo.jpg');
        $post = $this->post->create($params);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Пост добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = $this->cateory->pluck('title', 'id');
        $tags = $this->tag->pluck('title', 'id');

        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PostRequest $request, Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        if($file = Post::uploadImage($request, $post->image)){
            $data['image'] = $file;
        }
        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        Storage::delete($post->image);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Запись удалена');

    }
}
