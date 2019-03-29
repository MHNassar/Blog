<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\ImprintRepository;
use App\Repositories\PostRepository;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $postRepository;
    private $imprintRepository;

    public function __construct(PostRepository $postRepo, ImprintRepository $imprintRepo)
    {
        $this->postRepository = $postRepo;
        $this->imprintRepository = $imprintRepo;
    }

    public function indexPage()
    {
        $posts_per_page = 3;
        $search = [];
        $posts = $this->postRepository->paginate($search, $posts_per_page);

        return view('website/pages/index')->with('posts', $posts);
    }

    public function getAuthorPosts($id)
    {
        $posts_per_page = 3;
        $search = ["author_id" => $id];
        $posts = $this->postRepository->paginate($search, $posts_per_page);
        return view('website/pages/index')->with('posts', $posts);

    }

    public function getimprintPage()
    {
        $imprint = $this->imprintRepository->all();
        if (count($imprint) > 0) {
            $imprint = $imprint[0];
        }
        $author = User::all();
        return view('website/pages/imprint')
            ->with('imprint', $imprint)
            ->with('authors', $author);

    }

    public function getPostDetails($id)
    {
        $post = $this->postRepository->find($id);
        return view('website/pages/post_details')
            ->with('post', $post);

    }
}
