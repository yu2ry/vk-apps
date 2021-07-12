<?php

namespace App\Repositories;

use App\Support\Contract\ReadRepository;
use App\Support\Contract\Repository;
use App\Support\Contract\ValueObjectContract;
use App\Support\DTOs\BaseDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository implements Repository, ReadRepository, ValueObjectContract
{

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var BaseDTO
     */
    protected $dto = BaseDTO::class;

    /**
     * @return BaseRepository
     */
    public static function init(): BaseRepository
    {
        return new static();
    }

    /**
     * @param BaseDTO $dto
     * @return Model
     */
    public function store(BaseDTO $dto): Model
    {
        return $this->model::create(
            $dto->toArray()
        );
    }

    /**
     * @param $value
     * @param string $column
     * @return Model
     */
    public function delete($value, string $column = 'id'): Model
    {
        $model = $this->model::where($column, $value)->firstOrFail();
        $model->delete();
        return $model;
    }

    /**
     * @param $value
     * @param BaseDTO $dto
     * @param string $column
     * @return Model
     */
    public function update($value, BaseDTO $dto, string $column = 'id'): Model
    {
        $model = $this->model::where($column, $value)
            ->update($dto->toArray());
        $model->refresh();
        return $model;
    }

    /**
     * @param $value
     * @param string $column
     * @param array $with
     * @param int $type
     * @return Model
     */
    public function findBy($value, string $column = 'id', array $with = [], int $type = self::GET_DEFAULT): Model
    {
        return $this->model::with($with)->where($column, $value)->first() ?? new $this->model;
    }

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
        return $this->model::with($with)
            ->whereIn($column, $params)
            ->skip($skip)
            ->limit($limit)
            ->get();
    }

    /**
     * @param $value
     * @param string $column
     * @return bool
     */
    public function has($value, string $column = 'id'): bool
    {
        return $this->model::where($column, $value)->exists();
    }

    /**
     * @param $param
     * @return bool
     */
    public function validate($param): bool
    {
        return true;
    }
}
