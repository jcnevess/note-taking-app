<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;

    protected $fillable = ['title', 'content', 'archived'];

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }
}
