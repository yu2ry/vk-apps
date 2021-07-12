<?php


namespace App\Repositories;

use App\Models\User;
use App\Support\DTOs\BaseDTO;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends BaseRepository
{

    /**
     * @var string
     */
    protected $model = User::class;

    /**
     * @param BaseDTO $dto
     * @return User
     */
    public function store(BaseDTO $dto): Model
    {
        return parent::store($dto);
    }
}
