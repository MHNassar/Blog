<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\PostHistoryRepository;
use App\Repositories\PostRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class PostController extends AppBaseController
{
    /** @var  PostRepository */
    private $postRepository;
    private $postHistoryRepository;

    public function __construct(PostRepository $postRepo, PostHistoryRepository $postHistoryRepo)
    {
        $this->postRepository = $postRepo;
        $this->postHistoryRepository = $postHistoryRepo;
    }

    /**
     * Display a listing of the Post.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $posts = $this->postRepository->all();

        return view('admin/posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin/posts.create');
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {
        $input = $request->all();
        $author_id = Auth::user()->id;
        $input["author_id"] = $author_id;

        $this->postRepository->create($input);

        Flash::success('Post saved successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified Post.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        return view('admin/posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        return view('admin/posts.edit')->with('post', $post);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param int $id
     * @param UpdatePostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->find($id);


        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        // Add to history before update to save older version
        $postHistory = ["title" => $post->title, "text" => $post->text,
            "date" => $post->date, "post_id" => $id];

        $this->postHistoryRepository->create($postHistory);

        $post = $this->postRepository->update($request->all(), $id);


        Flash::success('Post updated successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        $this->postRepository->delete($id);

        Flash::success('Post deleted successfully.');

        return redirect(route('posts.index'));
    }

}
