<?php

namespace App\Services;

use App\Models\Game;
use App\Models\RatingUser;
use App\Models\User;
use App\Repositories\RatingUserRepository;
use App\Support\DTOs\RatingDTO;
use App\Support\DTOs\UserDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class RatingService
 * @package App\Services\Fir
 */
class RatingService
{

    const LIMIT = 7;

    const USER_IDS = 'user_ids';

    /**
     * @param UserDTO $dto
     * @return User
     */
    public function create(UserDTO $dto): User
    {
        //
    }

    /**
     * @param RatingDTO $dto
     * @param array $ps
     * @param int $game
     * @return Collection
     */
    public function get(RatingDTO $dto, array $ps = [], int $game = Game::FIR): Collection
    {
        $repository = RatingUserRepository::init();
        $with = [RatingUser::RELATION_USER];
        $params = [];
        $column = 'created_at';
        if (is_null($dto->getType())) {
            $params = $this->betweenData();
            $type = RatingUserRepository::GET_BETWEEN;
        } else {
            $type = RatingUser::getTypeIdByName($dto->getType());
            if ($type === RatingUserRepository::GET_TODAY) {
                $params = $this->betweenData();
            } else if ($type === RatingUserRepository::GET_FRIENDS) {
                $params = [
                    RatingUserRepository::FIELD_USER_IDS => $ps[self::USER_IDS]
                ];
            }
        }
        return $repository->get(
            array_merge(
                $params,
                [
                    RatingUserRepository::FIELD_GAME_ID => $game
                ]
            ),
            $column,
            $with,
            self::LIMIT * $dto->getPage(),
            self::LIMIT * ($dto->getPage() - 1),
            $type
        );
    }

    /**
     * @return string[]
     */
    private function betweenData(): array
    {
        $date = date('Y-m-d');
        return [
            RatingUserRepository::FIELD_START_DATE => $date . ' 00:00:00',
            RatingUserRepository::FIELD_END_DATE => $date . ' 23:59:59',
        ];
    }

    /**
     * @param int $page
     * @param int $game
     * @return Collection
     */
    public function today(int $page, int $game = Game::FIR): Collection
    {
        $date = date('Y-m-d');
        return
            RatingUser::with(['user'])
                ->select('user_id', DB::raw('count(*) as count'))
                ->where('game_id', $game)
                ->whereBetween('created_at', [$date . ' 00:00:00', $date. ' 23:59:00'])
                ->groupBy('user_id')
                ->orderBy('count', 'desc')
                ->skip(self::LIMIT * ($page - 1))
                ->limit($page * self::LIMIT)
                ->get();
    }

    public function all()
    {

    }

    public function friends()
    {

    }

}
