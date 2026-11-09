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
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(4)
            ->get();

        $comments = $post->comments()
            ->whereNull('parent_id')
            ->with(['user', 'replies'])
            ->latest()
            ->get();

        $totalComments = $post->comments()->count();

        return view('blog.post', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'comments' => $comments,
            'totalComments' => $totalComments
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
