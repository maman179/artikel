<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => 'required|string|min:3|max:1000'
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $validated['body']
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        // Pastikan komentar milik artikel tersebut
        abort_unless($comment->post_id === $post->id, 404);

        // Pastikan komentar milik pengguna login
        abort_unless($comment->user_id === auth()->id(), 403);

        $validated = $request->validate([
            'body' => 'required|string|min:3|max:1000'
        ]);

        $comment->update([
            'body' => $validated['body']
        ]);

        return back()->with('success', 'Komentar berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus komentar
    public function destroy(Post $post, Comment $comment)
    {
        abort_unless($comment->post_id === $post->id, 404);

        abort_unless($comment->user_id === auth()->id(), 403);

        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus!');
    }

    // Membalas komentar
    public function reply(Request $request, Post $post, Comment $comment)
    {
        abort_unless($comment->post_id === $post->id, 404);

        // Hanya komentar utama yang bisa dibalas
        abort_if($comment->parent_id !== null, 404);

        $validated = $request->validate([
            'body' => 'required|string|min:3|max:1000'
        ]);

        $comment->replies()->create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => $validated['body']
        ]);

        return back()->with('success', 'Balasan berhasil ditambahkan!');
    }
}
