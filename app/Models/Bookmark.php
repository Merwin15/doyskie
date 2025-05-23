<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $table = 'bookmarks';

    protected $primaryKey = 'bookmark_id';

    protected $fillable = ['user_id', 'book_id'];

    /**
     * Get the user that owns the bookmark.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the book that is bookmarked.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
