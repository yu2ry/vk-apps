<?php

namespace App\Support\Contract;

/**
 * Interface ValueObjectContract
 * @package App\Support\Contract
 */
interface ValueObjectContract
{

    /**
     * @param $param
     * @return bool
     */
    public function validate($param): bool;
}
