<?php

namespace App\Models;

use App\Services\FakeNumber;
use App\Services\JournalService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'hash', 'created_at', 'updated_at', 'user_created', 'journal_name'];

    public function quests(): HasMany
    {
        return $this->hasMany(Quest::class);
    }

    protected function getHashAttribute(): string
    {
        return $this->attributes['hash'] = md5((new FakeNumber())->generate($this->title));
    }

    protected function getUserCreatedAttribute(): string
    {
        return $this->attributes['user_created'] = User::inRandomOrder()->first()->name ?? 'No user';
    }

    protected function getJournalNameAttribute(): string
    {
        return $this->attributes['journal_name'] = 'Journal of ' . (new JournalService())->generate();
    }

}
