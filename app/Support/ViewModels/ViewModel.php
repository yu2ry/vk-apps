<?php

namespace App\Support\ViewModels;

use App\Support\Contract\ViewModel as ViewModelContract;

/**
 * Class ViewModel
 * @package App\ViewModels
 */
abstract class ViewModel implements ViewModelContract
{

    /**
     * @var array
     */
    protected $data;

    /**
     * @return ViewModel
     */
    public static function init(): ViewModel
    {
        return new static();
    }
}
