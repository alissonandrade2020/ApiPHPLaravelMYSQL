<?php

namespace App\Repositories;

use App\Dish;
use App\Repositories\Contracts\DishRepositoryInterface;

/**
 * Class ClientsRepository.
 */
class DishRepository extends AbstractRepository implements DishRepositoryInterface
{
    protected $dish;

    public function __construct(Dish $dish)
    {
        parent::__construct($dish);
    }
}
