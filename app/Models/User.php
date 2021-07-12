<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const FIELD_SOCIAL_TYPE_ID = 'social_type_id';
    const FIELD_SOCIAL_ID = 'social_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::FIELD_SOCIAL_TYPE_ID,
        self::FIELD_SOCIAL_ID
    ];

    /**
     * @return BelongsTo
     */
    public function social(): BelongsTo
    {
        return $this->belongsTo(Social::class, self::FIELD_SOCIAL_TYPE_ID);
    }

    /**
     * @return HasMany
     */
    public function rating(): HasMany
    {
        return $this->hasMany(RatingUser::class, 'user_id');
    }
}
