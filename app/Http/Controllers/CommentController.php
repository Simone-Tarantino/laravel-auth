<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'body' => 'required|string|max:150',
            'post_id' => 'required|numeric|exists:posts,id'
        ]);

        $data = $request->all();

        $newComment = new Comment;
        $newComment->fill($data);

        $saved = $newComment->save();
        
        if(!$saved) {
            return redirect()->back();        
        }

        return redirect()->route('posts.show', $newComment->post->slug);
    }
}
