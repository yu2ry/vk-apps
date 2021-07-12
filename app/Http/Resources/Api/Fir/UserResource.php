<?php

namespace App\Http\Resources\Api\Fir;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package App\Http\Resources\Api\Fir
 */
class UserResource extends JsonResource
{

    const FIELD_ID = 'id';
    const FIELD_COUNT = 'count';
    const FIELD_SOCIAL_ID = 'social_id';

    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            self::FIELD_ID => $this->id,
            self::FIELD_SOCIAL_ID => $this->social_id,
            self::FIELD_COUNT => $this->when($this->rating, $this->rating()->byGame($this->game_id)->count())
        ];
    }
}
