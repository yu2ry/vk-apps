<?php

namespace App\Factory;

use App\Support\Contract\AbstractFactory as AbstractFactoryContract;
use Prophecy\Exception\Doubler\ClassNotFoundException;

/**
 * Class AbstractFactory
 * @package App\Factory
 */
abstract class AbstractFactory implements AbstractFactoryContract
{

    /**
     * @return AbstractFactory
     */
    public static function init(): AbstractFactory
    {
        return new static();
    }

    /**
     * @param $abstract
     * @param array $params
     */
    public static function create($abstract, array $params)
    {
        if (!class_exists($abstract)) {
            throw new ClassNotFoundException('Not Found', $abstract);
        }
    }
}
