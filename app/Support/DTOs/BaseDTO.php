<?php

namespace App\Support\DTOs;

use App\Factory\DtoFactory;
use App\Support\Contract\DTOContract;
use App\Support\Contract\ValueObjectContract;
use App\Support\ValueObject\ValueObjectId;

/**
 * Class BaseDTO
 * @package App\Support\DTOs
 */
abstract class BaseDTO implements DTOContract, ValueObjectContract
{

    const ID = 'id';
    const NAME = 'name';

    /**
     * @var string[]
     */
    protected static $fields = [
        self::ID,
        self::NAME
    ];

    /**
     * @var array
     */
    protected $validates = [
        self::ID => ValueObjectId::class
    ];

    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $array
     * @param bool $validate
     * @return BaseDTO
     */
    public static function fromArray(array $array, bool $validate = true): BaseDTO
    {
        if ($validate && count(array_diff((static::$fields), array_keys($array))) !== 0)
        {
            throw new \InvalidArgumentException('allowed fields ' . implode(',', static::$fields));
        }
        $dto = new static();
        $dto->data = $array;
        return $dto;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @param $param
     * @return bool
     */
    public function validate($param): bool
    {
        return true;
    }

    /**
     * @param string $param
     */
    protected function emptyField(string $param): void
    {
        if (!isset($this->data[$param])) {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * @param string $param
     * @return mixed
     */
    protected function emptyFieldAndGetValue(string $param)
    {
        $this->emptyField($param);
        return $this->data[$param];
    }

    /**
     * @return array
     */
    public function getUpdateFields(): array
    {
        return $this->data;
    }
}
