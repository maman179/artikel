<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'title' => 'Ini Halaman Dashboard - Post',
            'posts' => Post::where('author_id', auth()->user()->id)->get(),
            'search' => Post::filter(request(['search', 'category']))->latest()->paginate(6)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(),
            'posts' => Post::where('author_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|min:8|max:255',
                'author_id' => 'required',
                'category_id' => 'required',
                'image' => 'image|file|max:1024',
                'slug' => 'required|unique:posts,slug',
                'caption' => 'required|max:255',
                'body' => 'required'
            ],
            [
                'title.required' => 'Title wajib diisi.',
                'title.min' => 'Judul Minimal 8 karakter.',
                'title.max' => 'Judul Maksimal 255 karakter.',
                'category_id.required' => 'Category wajib di isi.',
                'image.image' => 'File harus berupa gambar.',
                'image.file' => 'File harus berupa file.',
                'image.max' => 'Ukuran gambar maksimal 1MB.',
                'slug.required' => 'Slug wajib di isi.',
                'body.required' => 'Artikel wajib di isi.',
            ]
        );

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['author_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard')->with('success', 'Artikel berhasi di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules =
            [
                'title' => 'required|min:8|max:255',
                'author_id' => 'required',
                'category_id' => 'required',
                'image' => 'image|file|max:1024',
                'caption' => 'required|max:255',
                'body' => 'required'
            ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['author_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard')->with('success', 'Artikel berhasi di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/dashboard')->with('success', 'Artikel berhasil di hapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
