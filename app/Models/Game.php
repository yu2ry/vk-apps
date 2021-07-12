<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Game
 * @package App\Models
 */
class Game extends Model
{
    use HasFactory;

    const FIR = 1;
    const ANIMALS = 2;

    const NAME_FIR = 'Елочка Гори';
    const NAME_ANIMALS = 'Зверята';

    const FIELD_ID = 'id';
    const FIELD_TYPE_SOCIAL_ID = 'social_type_id';
    const FIELD_NAME = 'name';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return array
     */
    public static function getItems(): array
    {
        return [
            [
                self::FIELD_ID => self::FIR,
                self::FIELD_NAME => self::NAME_FIR
            ],
            [
                self::FIELD_ID => self::ANIMALS,
                self::FIELD_NAME => self::NAME_ANIMALS
            ]
        ];
    }

    /**
     * @return BelongsTo
     */
    public function social(): BelongsTo
    {
        return $this->belongsTo(Social::class, self::FIELD_TYPE_SOCIAL_ID);
    }
}
