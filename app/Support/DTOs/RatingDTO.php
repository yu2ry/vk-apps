<?php

namespace App\Support\DTOs;

/**
 * Class RatingDTO
 * @package App\Support\DTOs
 */
class RatingDTO extends BaseDTO
{

    const TYPE = 'type';
    const PAGE = 'page';

    /**
     * @var string[]
     */
    protected static $fields = [
        self::TYPE,
        self::PAGE
    ];

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->emptyFieldAndGetValue(self::PAGE);
    }

    /**
     * @return string|null
     */
    public function getType():? string
    {
        return $this->data[self::TYPE] ?? null;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->data[self::PAGE] = $page;
    }
}
