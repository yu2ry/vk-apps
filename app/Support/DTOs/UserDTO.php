<?php

namespace App\Support\DTOs;

/**
 * Class UserDTO
 * @package App\Support\DTOs
 */
class UserDTO extends BaseDTO
{

    const SOCIAL_ID = 'social_id';
    const SOCIAL_TYPE_ID = 'social_type_id';

    /**
     * @var string[]
     */
    protected static $fields = [
        self::SOCIAL_ID,
        self::SOCIAL_TYPE_ID
    ];

    /**
     * @return int
     */
    public function getSocialTypeId(): int
    {
        return $this->emptyFieldAndGetValue(self::SOCIAL_TYPE_ID);
    }

    /**
     * @return int
     */
    public function getSocialId(): int
    {
        return $this->emptyFieldAndGetValue(self::SOCIAL_ID);
    }
}
