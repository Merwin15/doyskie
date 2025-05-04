<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the books that this user has bookmarked.
     */
    public function bookmarkedBooks()
    {
        return $this->belongsToMany(Book::class, 'bookmarks', 'user_id', 'book_id')
                    ->withTimestamps();
    }

    /**
     * Bookmark a book.
     */
    public function bookmarkBook(Book $book)
    {
        if (!$this->hasBookmarked($book)) {
            $this->bookmarkedBooks()->attach($book->id);
            return true;
        }
        return false;
    }

    /**
     * Remove a bookmark.
     */
    public function removeBookmark(Book $book)
    {
        return $this->bookmarkedBooks()->detach($book->id);
    }

    /**
     * Check if user has bookmarked a book.
     */
    public function hasBookmarked(Book $book)
    {
        return $this->bookmarkedBooks()->where('book_id', $book->id)->exists();
    }
}
