<?php

namespace App\Support\Contract;

/**
 * Interface Factory
 * @package App\Support\Contract
 */
interface AbstractFactory
{

    /**
     * @param $abstract
     * @param array $params
     * @return mixed
     */
    public static function create($abstract, array $params);
}
