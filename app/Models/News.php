<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title','category','news','photo'];

    public function category (): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator (): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comment (): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
