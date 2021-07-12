<?php

namespace App\Support\DTOs;

/**
 * Class ViewerDTO
 * @package App\Support\DTOs
 */
class ViewerDTO extends BaseDTO
{

    const VIEWER_ID = 'viewer_id';

    /**
     * @var string[]
     */
    protected static $fields = [
        self::VIEWER_ID
    ];

    /**
     * @return int
     */
    public function getViewerId(): int
    {
        return $this->emptyFieldAndGetValue(self::VIEWER_ID);
    }
}
