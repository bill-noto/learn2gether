<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $userPosts = Post::where('user_id', $user->id)->get();

        $arr = [];
        foreach ($userPosts as $post) {
            foreach (Comment::all() as $comment) {
                if ($comment->post_id == $post->id) {
                    $arr[] = $comment;
                }
            }
        }

        return Inertia::render('PostsIndex', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'posts' => $userPosts,
            'comments' => $arr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('PostCreate', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Post::create($request->all());

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $arr = [];
        foreach (Comment::all() as $comment) {
            if ($comment->post_id == Post::find($id)->id) {
                $arr[] = $comment;
            }
        }

        return Inertia::render('PostShow', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'post' => Post::find($id),
            'comments' => $arr
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        return Inertia::render('PostEdit', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'post' => Post::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Inertia\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);

        $post->update($request->all());

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id)->id;

        Comment::destroy(Comment::where('post_id', $post)->get());

        Post::destroy($id);

        return $this->index();
    }
}
