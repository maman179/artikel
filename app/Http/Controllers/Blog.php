<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class Blog extends Controller
{
    public function index()
    {
        return view('blog.posts', [
            'title' => 'Blog',
            'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('blog.post', [
            'title' => "Single Post",
            'post' => $post
        ]);
    }

    public function posts(User $user)
    {
        return view(
            'blog.posts',
            [
                'title' => count($user->post) . ' Article By  '  . $user->name,
                'posts' => $user->Post
            ]
        );
    }

    public function categories(Category $category)
    {
        return view(
            'blog.posts',
            [
                'title' => ' Article in  '  . $category->name,
                'posts' => $category->posts
            ]
        );
    }
}
