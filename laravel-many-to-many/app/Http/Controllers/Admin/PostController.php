<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;

class PostController extends Controller
{

    public $validators = [
        'title'     => 'required|max:100',
        'content'   => 'required|min:10'
    ];

    private function getValidators($model) {
        return [
            'title'     => 'required|max:100',
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($model),
                'max:100'
            ],
            'content'   => 'required|min:10',
            'category_id' => 'required|exists:App\Category,id'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::where('id', '>', 0);

        if ($request->s) {
            $posts->where('title', 'LIKE', "%$request->s%");
        }

        if ($request->category) {
            $posts->where('category_id', $request->category);
        }

        if ($request->author) {
            $posts->where('user_id', $request->author);
        }

        $posts = $posts->paginate(20);

       $categories = Category::all();

       $users = User::all();

        return view('admin.posts.index', 
        [
            'posts' => $posts,
            'users' => $users,
            'categories' => $categories,
            'request'       => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidators(null));

        $formData = $request->all() + [
            'user_id' => Auth::user()->id
        ];
        $post = Post::create($formData);

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'pageTitle' => $post->title,
            'post'     => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->id !== $post->user_id) abort(403);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        if (Auth::user()->id !== $post->user_id) abort(403);

        $request->validate($this->getValidators($post));

        $post->update($request->all());

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::user()->id !== $post->user_id) abort(403);

        $post->delete();

        if (url()->previous() === route('admin.posts.edit', $post->slug)) {
            return redirect()->route('admin.home')->with('status', "Post $post->title deleted");;
        }
        return redirect(url()->previous())->with('status', "Post $post->title deleted");;;
    }


    public function myindex() {

        $posts = Post::where('user_id', Auth::user()->id)->paginate(30);

        return view('admin.posts.myindex', compact('posts'));

        
    }
}
