<?php

namespace App\Support\Contract;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface ReadRepository
 * @package App\Support\Contract
 */
interface ReadRepository
{

    const GET_DEFAULT = 1;
    const GET_BETWEEN = 2;

    /**
     * @param array $params
     * @param string $column
     * @param array $with
     * @param int $limit
     * @param int $skip
     * @param int $type
     * @return Collection
     */
    public function get(
        array $params,
        string $column = 'id',
        array $with = [],
        int $limit = 0,
        int $skip = 0,
        int $type = self::GET_DEFAULT
    ): Collection;

    /**
     * @param $value
     * @param string $column
     * @param array $with
     * @param int $type
     * @return Model
     */
    public function findBy($value, string $column = 'id', array $with = [], int $type = self::GET_DEFAULT): Model;

    /**
     * @param $value
     * @param string $column
     * @return bool
     */
    public function has($value, string $column = 'id'): bool;
}
