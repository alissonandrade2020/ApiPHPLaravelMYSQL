<?php

namespace App\Repositories;

use App\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;

/**
 * Class ClientsRepository.
 */
class ClientRepository extends AbstractRepository implements ClientRepositoryInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        parent::__construct($client);
    }
}
