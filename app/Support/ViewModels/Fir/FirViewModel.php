<?php

namespace App\Support\ViewModels\Fir;

use App\Http\Resources\Api\Fir\UserResource;
use App\Support\ViewModels\ViewModel;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class FirViewModel
 * @package App\ViewModels\Fir
 */
class FirViewModel extends ViewModel
{

    const FIELD_USER_ID = 'user_id';
    const FIELD_COUNT = 'count';

    /**
     * @param JsonResource $resource
     * @return FirViewModel
     */
    public static function fromResource(JsonResource $resource): ViewModel
    {
        $response = $resource->toArray(null);
        $viewModel = static::init();
        $viewModel->data[self::FIELD_USER_ID] = $response[UserResource::FIELD_ID];
        $viewModel->data[self::FIELD_COUNT] = $response[UserResource::FIELD_COUNT];
        return $viewModel;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->data[self::FIELD_USER_ID];
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->data[self::FIELD_COUNT];
    }
}
