<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasMany };
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'client_id',
        'deadline',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function client(): BelongsTo
    {
        return $this->BelongsTo(Client::class);
    }

    public function tasks(): HasMany
    {
        return $this->HasMany(Task::class);
    }
}
