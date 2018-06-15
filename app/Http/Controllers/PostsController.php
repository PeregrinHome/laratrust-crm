<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PostsController extends Controller
{
    protected $users;
    protected $posts;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $posts, User $users)
    {
        $this->users = $users;
        $this->posts = $posts;
        Route::model('post',Post::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $frd   = $request->all();
        $posts = $this
            ->posts
            ->filter($frd)
            ->paginate($frd['perPage'] ?? $this->posts->getPerPage())
            ->appends($frd);

        return view('posts.index', compact('posts', 'frd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);
        $frd = $request->all();
        $frd['user_id'] = Auth::user()->getKey();
        $post = $this->posts->create($frd);

        $flashMessage = [
            'type' => 'success',
            'text' => 'Пост «' . $post->name . '» успешно создан.',
        ];
        if ($request->ajax())
        {
            $response = response()->json($flashMessage);
        }
        else
        {
            $response = redirect()->back()->with(['flash_message' => $flashMessage]);
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $frd = $request->all();
        $post->update($frd);

        $flashMessage = [
            'type' => 'success',
            'text' => 'Пост «' . $post->getName(). '» успешно обновлен',
        ];

        if ($request->ajax())
        {
            $response = response()->json($flashMessage);
        }
        else
        {
            $response = redirect()->back()->with(['flash_message' => $flashMessage]);
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->users->destroy($post->getKey());

        $flashMessage = [
            'type' => 'success',
            'text' => 'Пост успешно удален.',
        ];
        $response = response()->json($flashMessage);

        return $response;
    }
}
