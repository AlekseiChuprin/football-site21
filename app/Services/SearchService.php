<?php


namespace App\Services;
use App\Models\Post;


class SearchService
{
    /**
     * @var Post
     */
    private $post;

    /**
     * SearchService constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @param string $param
     * @return mixed
     */
    public function searchPostByName(string $param)
    {
        return $this->post->where('title','LIKE','%'.$param.'%')->paginate(3);
    }

    /**
     * @param string $param
     * @return mixed
     */
    public function search(string $param)
    {
        return $this->searchPostByName($param);
    }

}
