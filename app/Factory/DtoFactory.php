<?php

namespace App\Factory;

/**
 * Class DtoFactory
 * @package App\Factory
 */
class DtoFactory extends AbstractFactory
{

    /**
     * @param $abstract
     * @param array $params
     * @return mixed
     */
    public static function create($abstract, array $params)
    {
        parent::create($abstract, $params);
        return $abstract::fromArray($params);
    }
}
