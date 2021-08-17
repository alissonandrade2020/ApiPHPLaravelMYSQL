<?php

namespace App\Repositories;

use App\Repositories\Contracts\StatusRepositoryInterface;
use App\Status;
use Illuminate\Http\Request;

/**
 * Class ClientsRepository.
 */
class StatusRepository extends AbstractRepository implements StatusRepositoryInterface
{
    protected $status;

    public function __construct(Status $status)
    {
        parent::__construct($status);
    }
}
