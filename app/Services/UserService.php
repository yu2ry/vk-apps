<?php

namespace App\Services;

use App\Factory\DtoFactory;
use App\Models\Social;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Support\DTOs\UserDTO;
use App\Support\DTOs\ViewerDTO;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * UserService constructor.
     * @param UserRepository|null $repository
     */
    public function __construct(UserRepository $repository = null)
    {
        $this->repository = $repository ?? UserRepository::init();
    }

    /**
     * @param ViewerDTO $dto
     * @param int $socialTypeId
     * @return User
     */
    public function findOrCreate(ViewerDTO $dto, int $socialTypeId = Social::VK): User
    {
        if (!($user = $this->repository->findBy($dto->getViewerId(), User::FIELD_SOCIAL_ID))->exists) {
            $user = $this->repository->store(DtoFactory::create(UserDTO::class, [
                UserDTO::SOCIAL_TYPE_ID => $socialTypeId,
                UserDTO::SOCIAL_ID => $dto->getViewerId()
            ]));
        }
        return $user;
    }
}
