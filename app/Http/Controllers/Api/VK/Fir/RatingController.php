<?php

namespace App\Http\Controllers\Api\VK\Fir;

use App\Factory\DtoFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Fir\Rating\IndexRequest;
use App\Http\Requests\Api\Fir\Rating\StoreRequest;
use App\Http\Resources\Api\Fir\UserRatingResource;
use App\Services\RatingService;
use App\Support\DTOs\RatingDTO;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class RatingController
 * @package App\Http\Controllers\Api\VK\Fir
 */
class RatingController extends Controller
{

    /**
     * @var RatingService
     */
    protected $service;

    /**
     * RatingController constructor.
     * @param RatingService $service
     */
    public function __construct(RatingService $service)
    {
        $this->service = $service;
    }

    /**
     * @param IndexRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(IndexRequest $request): AnonymousResourceCollection
    {
        $dto = DtoFactory::create(RatingDTO::class, [
            RatingDTO::TYPE => $request->getType(),
            RatingDTO::PAGE => $request->getPage()
        ]);
        $collections = $this->service->get($dto);
        $dto->setPage($dto->getPage() + 1);
        return UserRatingResource::collection($collections)
            ->additional([
                IndexRequest::FIELD_TYPE => $dto->getType(),
                IndexRequest::FIELD_PAGE => $dto->getPage() - 1,
                IndexRequest::FIELD_NEXT => $this->service->get($dto)->count() > 0
            ]);
    }

    /**
     * @param StoreRequest $request
     * @return UserRatingResource
     */
    public function store(StoreRequest $request): UserRatingResource
    {
        return new UserRatingResource(null);
    }
}
