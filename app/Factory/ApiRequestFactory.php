<?php

namespace App\Factory;

use Illuminate\Foundation\Http\FormRequest;
use Prophecy\Exception\Doubler\ClassNotFoundException;

/**
 * Class ApiRequestFactory
 * @package App\Factory
 */
class ApiRequestFactory extends AbstractFactory
{

    /**
     * @param $abstract
     * @param array $params
     * @return FormRequest
     */
    public static function create($abstract, array $params = [])
    {
        if (!class_exists($abstract)) {
            throw new ClassNotFoundException('Not Found', $abstract);
        }
        $request = new $abstract();
        $request->merge($params);
        return $request;
    }
}
