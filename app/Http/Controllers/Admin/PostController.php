<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Tag;

use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::where('user_id', Auth::id())->get();
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idUser = Auth::user()->id;

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $data = $request->all();

        $newPost = new Post;
        $newPost->title = $data['title'];
        $newPost->body = $data['body'];
        $newPost->user_id = $idUser;
        $newPost->slug = Str::finish(Str::slug($newPost->title), rand(1, 1000000));

        $saved = $newPost->save();
        if (!$saved) {
            return redirect()->back();
        }

        $tags = $data['tags'];
        if(!empty($tags)) {
            $newPost->tags()->attach($tags);
        }

        return redirect()->route('admin.posts.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        
        if ($post->user_id == Auth::id()) {
            $tags = Tag::all();
    
            $data = [
                'tags' => $tags,
                'post' => $post
            ];
            
            return view('admin.posts.edit', $data);
        }

        abort('404');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $idUser = Auth::user()->id;
        if(empty($post)) {
            abort('404');
        }

        if ($post->user->id != $idUser) {
            abort('404');
        }

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);
        $data = $request->all();

        $post->title = $data['title'];
        $post->title = $data['body'];
        $post->slug = Str::finish(Str::slug($post->title), rand(1, 1000000));
        
        $updated = $post->update();

        if (!$updated) {
            return redirect()->back();
        }

        $tags = $data['tags'];

        if(!empty($tags)) {
            $post->tags()->sync($tags);
        }

        return redirect()->route('admin.posts.show', $post->slug);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(empty($post)) {
            abort('404');
        }

        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
