<?php

use App\Http\Controllers\Web\VK\Fir\FirController;
use App\Http\Controllers\Web\VK\Fir\RatingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('vk')
    ->group(function () {
        Route::prefix('fir')
            ->group(function () {
                Route::apiResource('/', FirController::class)
                    ->only([
                        'index',
                        'store'
                    ])
                    ->name('index', 'vk.fir')
                    ->name('index', 'vk.fir.store');
                Route::apiResource('rating', RatingController::class)
                    ->only([
                        'index'
                    ])
                ->name('index', 'vk.fir.rating');
            });
        Route::prefix('animals')
            ->group(function () {

            });
    });
