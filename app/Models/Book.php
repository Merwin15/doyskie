<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    
    protected $fillable = [
        'title',
        'description',
        'author',
        'genre',
        'image',
        'available'
    ];

    /**
     * Get the users who have bookmarked this book.
     */
    public function bookmarkedBy()
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'book_id', 'user_id')
                    ->withTimestamps();
    }

    /**
     * Check if a specific user has bookmarked this book.
     */
    public function isBookmarkedBy(User $user)
    {
        return $this->bookmarkedBy()->where('user_id', $user->id)->exists();
    }
}
