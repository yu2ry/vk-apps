<?php

namespace App\Support\Contract;

use App\Support\DTOs\BaseDTO;

/**
 * Interface DTOContract
 * @package App\Support\Contract
 */
interface DTOContract
{

    /**
     * @param array $array
     * @param bool $validate
     * @return BaseDTO
     */
    public static function fromArray(array $array, bool $validate = true): BaseDTO;

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return array
     */
    public function getUpdateFields(): array;
}
