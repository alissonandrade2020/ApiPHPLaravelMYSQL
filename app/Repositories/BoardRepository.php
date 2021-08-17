<?php

namespace App\Repositories;

use App\Board;
use App\Repositories\Contracts\DishRepositoryInterface;

/**
 * Class ClientsRepository.
 */
class BoardRepository extends AbstractRepository implements DishRepositoryInterface
{
    protected $board;

    public function __construct(Board $board)
    {
        parent::__construct($board);
    }

    /**
     * @return array
     */
    public function list(): array
    {
        return $this->model->pluck('number', 'id')->toArray();
    }
}
