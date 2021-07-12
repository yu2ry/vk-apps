<?php

namespace App\Support\Contract;

use App\Support\DTOs\BaseDTO;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface Repository
 * @package App\Support\Contract
 */
interface Repository
{

    /**
     * @param BaseDTO $dto
     * @return Model
     */
    public function store(BaseDTO $dto): Model;

    /**
     * @param string $column
     * @param $value
     * @return Model
     */
    public function delete($value, string $column = 'id'): Model;

    /**
     * @param $value
     * @param BaseDTO $dto
     * @param string $column
     * @return Model
     */
    public function update($value, BaseDTO $dto, string $column = 'id'): Model;
}
