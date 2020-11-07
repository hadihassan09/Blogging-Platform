<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'type' => 'required',
            'public' => 'required'
        ], [
            'title.required' => 'Title is required',
            'text.required' => 'Description is required',
            'type.required' => 'Type is required',
            'public.required' => 'Select Post Type'
        ]);

        Post::create([
            'title' => $request->input('title'),
           'text' => $request->input('text'),
           'type' => $request->input('type'),
           'public' => $request->input('public'),
           'user_id' => Auth::id()
        ]);

        return redirect('post/create')->with('success', 'Post Form Data Has Been Posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', [ 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * Likes the Post
     *
     * @return \Illuminate\Http\Response
     */
    public function likePost(Request $request){
        $like = Like::where('user_id', Auth::id())->where('post_id', $request->post_id)->first();

        if($like === null) //user is Liked so unlike
        {
            Like::create([
                'user_id' => Auth::id(),
                'post_id' => $request->post_id
            ]);
            return response()->json(['success' => 'liked']);
        }
        else
        {  //user is not liked so make liked
            $like->delete();
            return response()->json(['success' => 'unliked']);
        }

    }

}
