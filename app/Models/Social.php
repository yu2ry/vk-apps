<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Social
 * @package App\Models
 */
class Social extends Model
{
    use HasFactory;

    const VK = 1;
    const VK_NAME = 'vk';

    const FILED_ID = 'id';
    const FIELD_NAME = 'name';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return string[]
     */
    public static function getSocials(): array
    {
        return [
            [
                self::FILED_ID => self::VK,
                self::FIELD_NAME => self::VK_NAME
            ]
        ];
    }
}
