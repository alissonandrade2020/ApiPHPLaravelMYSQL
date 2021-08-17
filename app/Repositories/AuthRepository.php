<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class ClientsRepository.
 */
class AuthRepository extends AbstractRepository implements AuthRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getByEmail(Request $request)
    {
        return $this->model->where('email', $request['email'])->first();
    }
}
