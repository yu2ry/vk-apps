<?php

namespace App\Support\Contract;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Support\ViewModels\ViewModel as ViewModelAbstract;

/**
 * Interface ViewModel
 * @package App\Support\Contract
 */
interface ViewModel
{

    /**
     * @param JsonResource $resource
     * @return ViewModelAbstract
     */
    public static function fromResource(JsonResource $resource): ViewModelAbstract;
}
