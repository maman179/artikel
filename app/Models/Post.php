<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;
use GuzzleHttp\Psr7\Query;
use Override;

class Post extends Model
{
    use HasFactory, Sluggable;

    // agar bisa di input
    protected $fillable = [
        'author_id',
        'category_id',
        'image',
        'title',
        'slug',
        'caption',
        'body'
    ];

    //Eager loading
    protected $with = ['author', 'category'];

    //Relasi antar model Post ke user ()
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Relasi antar model Post ke categori ()
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')

        );

        //relasi antar table category
        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        //relasi antar table author
        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    #[Override]
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
