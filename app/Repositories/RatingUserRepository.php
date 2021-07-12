<?php

namespace App\Repositories;

use App\Models\RatingUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class RatingUserRepository
 * @package App\Repositories
 */
class RatingUserRepository extends BaseRepository
{

    /**
     * @var string
     */
    protected $model = RatingUser::class;

    const GET_TODAY = 10;
    const GET_ALL = 20;
    const GET_FRIENDS = 30;

    const FIELD_START_DATE = 'start_date';
    const FIELD_END_DATE = 'end_date';
    const FIELD_GAME_ID = 'game_id';
    const FIELD_USER_IDS = 'user_ids';

    /**
     * @param array $params
     * @param string $column
     * @param array $with
     * @param int $limit
     * @param int $skip
     * @param int $type
     * @return Collection
     */
    public function get(array $params, string $column = 'id', array $with = [], int $limit = 0, int $skip = 0, int $type = self::GET_DEFAULT): Collection
    {
        if ($type === self::GET_DEFAULT) {
            return parent::get($params, $column, $with, $limit, $skip, $type);
        }
        $this->model = $this->initGet($params, $with);
        if ($type === self::GET_TODAY) {
            $this->model->whereBetween(RatingUser::CREATED_AT, [
                    $params[self::FIELD_START_DATE],
                    $params[self::FIELD_END_DATE]
                ]);
        }
        if ($type === self::GET_FRIENDS) {
            $this->model->whereIn(RatingUser::FIELD_USER_ID, $params[self::FIELD_USER_IDS]);
        }
        return $this->model
            ->groupBy(RatingUser::FIELD_USER_ID)
            ->orderBy(RatingUser::DYNAMIC_FIELD_COUNT, RatingUser::SORT)
            ->skip($skip)
            ->limit($limit)
            ->get();
    }

    /**
     * @param array $params
     * @param array $with
     * @return Builder
     */
    final protected function initGet(array $params, array $with): Builder
    {
        return $this->model::with($with)
            ->select(
                RatingUser::FIELD_USER_ID,
                DB::raw('count(*) as ' . RatingUser::DYNAMIC_FIELD_COUNT)
            )
            ->where(RatingUser::FIELD_GAME_ID, $params[self::FIELD_GAME_ID]);
    }
}
