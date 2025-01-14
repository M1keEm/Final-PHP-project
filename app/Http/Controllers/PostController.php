<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isFalse;

class PostController extends Controller
{
    public function deletePost(Post $post, Request $request)
    {
        if (auth()->user()->id === $post['user_id'] | auth()->user()->is_admin) {
            $post->delete();
        }
        $request->input('redirect_url', '/');
        if (str_contains(url()->previous(), '/food')) {
            $redirectUrl = '/food#opinions';
        } elseif (str_contains(url()->previous(), '/turism')) {
            $redirectUrl = '/turism#opinions';
        } elseif (str_contains(url()->previous(), '/transport')) {
            $redirectUrl = '/transport#opinions';
        } elseif (str_contains(url()->previous(), '/sport')) {
            $redirectUrl = '/sport#opinions';
        } else {
            $redirectUrl = '/#opinions';
        }
        return redirect($redirectUrl);
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
        $request->input('redirect_url', '/');
        if (str_contains(url()->previous(), '/food')) {
            $redirectUrl = '/food#opinions';
        } elseif (str_contains(url()->previous(), '/turism')) {
            $redirectUrl = '/turism#opinions';
        } elseif (str_contains(url()->previous(), '/transport')) {
            $redirectUrl = '/transport#opinions';
        } elseif (str_contains(url()->previous(), '/sport')) {
            $redirectUrl = '/sport#opinions';
        } else {
            $redirectUrl = '/#opinions';
        }
        return redirect($redirectUrl);
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
        $request->input('redirect_url', '/');
        if (str_contains(url()->previous(), '/food')) {
            $redirectUrl = '/food#opinions';
        } elseif (str_contains(url()->previous(), '/turism')) {
            $redirectUrl = '/turism#opinions';
        } elseif (str_contains(url()->previous(), '/transport')) {
            $redirectUrl = '/transport#opinions';
        } elseif (str_contains(url()->previous(), '/sport')) {
            $redirectUrl = '/sport#opinions';
        } else {
            $redirectUrl = '/#opinions';
        }
        return redirect($redirectUrl);
    }
}
