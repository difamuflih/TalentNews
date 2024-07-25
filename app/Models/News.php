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
    protected $fillable = ['title','category_id','news','photo'];

    public function categories (): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function creator (): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment (): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
