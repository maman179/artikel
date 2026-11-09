<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'parent_id',
        'body'
    ];

    // Relasi ke artikel
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relasi ke pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi komentar utama
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Relasi balasan komentar
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')
            ->with('user')
            ->latest();
    }
}
