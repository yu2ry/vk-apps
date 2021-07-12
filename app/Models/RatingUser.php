<?php

namespace App\Models;

use App\Repositories\RatingUserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class RatingUser
 * @package App\Models
 */
class RatingUser extends Model
{
    use HasFactory;

    const FIELD_USER_ID = 'user_id';
    const FIELD_GAME_ID = 'game_id';
    const DYNAMIC_FIELD_COUNT = 'count';
    const SORT = 'desc';

    const TODAY = 'today';
    const ALL = 'all';
    const FRIENDS = 'friends';

    /**
     * @param string $type
     * @return int
     */
    final public static function getTypeIdByName(string $type): int
    {
        switch ($type) {
            case self::TODAY:
                return RatingUserRepository::GET_TODAY;
            case self::FRIENDS:
                return RatingUserRepository::GET_FRIENDS;
            default:
                return RatingUserRepository::GET_ALL;
        }
    }

    /**
     * @return string[]
     */
    public static function types(): array
    {
        return [
            self::TODAY,
            self::ALL,
            self::FRIENDS
        ];
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        self::FIELD_USER_ID,
        self::FIELD_GAME_ID
    ];

    const RELATION_USER = 'user';
    const RELATION_GAME = 'game';

    /**
     * @param Builder $builder
     * @param int $game
     * @return Builder
     */
    public function scopeByGame(Builder $builder, int $game): Builder
    {
        return $builder->where(self::FIELD_GAME_ID, $game);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
