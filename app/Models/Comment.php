<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment'];


    public function news (): BelongsTo
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
