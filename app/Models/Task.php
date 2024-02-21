<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasMany };
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function project(): BelongsTo
    {
        return $this->BelongsTo(Project::class);
    }
}
