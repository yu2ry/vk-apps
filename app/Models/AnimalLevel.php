<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnimalLevel
 * @package App\Models
 */
class AnimalLevel extends Model
{
    use HasFactory;

    const FIELD_LEVEL_ID = 'level_id';
    const FIELD_COUNT = 'count';
    const FIELD_COUNT_SPACE = 'count_space';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $primaryKey = self::FIELD_LEVEL_ID;
}
