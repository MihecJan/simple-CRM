<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasMany };
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'description'
    ];

    /**
     * Client stages
     */
    public const STAGES = [
        'potential' => 1,
        'negotiation' => 2,
        'won/lost' => 3,
        'returning' => 4,
    ];

    /**
     * Returns the ID of a given stage.
     * 
     * @param string $stage client stage
     * @return int stage_id
     */
    public static function getStageID($stage)
    {
        return array_search($stage, self::STAGES);
    }

    /**
     * Get current client stage
     */
    public function getStageAttribute()
    {
        return self::STAGES[$this->attributes['stage_id']];
    }

    /**
     * Set client's stage
     */
    public function setStageAttribute($stage)
    {
        $stage_id = self::getStageID($stage);

        if ($stage_id) {
            $this->attributes['stage_id'] = $stage_id;
        }
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
