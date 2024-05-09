<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id', 'description', 'reward', 'created_at', 'expires_at', 'last_access', 'user_reward'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function getExpiresAtAttribute($created_at): string
    {
        return $this->attributes['expires_at'] = date('Y-m-d H:i:s', strtotime($created_at . ' + 30 days'));
    }

    protected function getLastAccessAttribute($created_at): string
    {
        return $this->attributes['last_access'] = date('Y-m-d H:i:s', strtotime($created_at . ' + 3 days'));
    }

    protected function getUserRewardAttribute(): string
    {
        return $this->attributes['user_reward'] = User::inRandomOrder()->first()->name ?? 'No user';
    }
}
