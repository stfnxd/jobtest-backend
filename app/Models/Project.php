<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Comment;
use App\Models\User;

class Project extends Model
{
    protected $fillable = [];
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    // relation to comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
