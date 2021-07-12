<?php

namespace App\Http\Resources\Api\Fir;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserRatingResource
 * @package App\Http\Resources\Api\Fir
 */
class UserRatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'user' => [
                'id' => $this->user->id,
                'social_id' => $this->user->social_id
            ],
            'count' => $this->count
        ];
    }
}
