<?php

namespace App\Http\Controllers\Api\VK\Fir;

use App\Factory\DtoFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Fir\IndexRequest;
use App\Http\Resources\Api\Fir\UserResource;
use App\Models\Game;
use App\Services\UserService;
use App\Support\DTOs\ViewerDTO;

/**
 * Class FirController
 * @package App\Http\Controllers\Api\VK\Fir
 */
class FirController extends Controller
{

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * FirController constructor.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param IndexRequest $request
     * @return UserResource
     */
    public function index(IndexRequest $request): UserResource
    {
        $user = $this->userService->findOrCreate(
            DtoFactory::create(ViewerDTO::class, [
                ViewerDTO::VIEWER_ID => $request->getViewerId()
            ])
        );
        $user->game_id = Game::FIR;
        return new UserResource($user);
    }
}
