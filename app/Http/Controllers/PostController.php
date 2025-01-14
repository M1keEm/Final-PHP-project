<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post)
    {
        if (auth()->user()->id === $post['user_id'] | auth()->user()->is_admin) {
            $post->delete();
        }
        return redirect('/#opinions');
    }

    public function actuallyUpdatePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post['user_id'] & !auth()->user()->is_admin) {
            return redirect('/');
        }
        $incomingFields = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/#opinions');
    }

    public function showEditScreen(Post $post)
    {
        if (auth()->user()->id !== $post['user_id'] & !auth()->user()->is_admin) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'category' => 'integer',
            'image' => 'image']);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/#opinions');
    }
}
