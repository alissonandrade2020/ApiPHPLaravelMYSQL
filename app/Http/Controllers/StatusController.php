<?php

namespace App\Http\Controllers;

use App\Repositories\StatusRepository;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    protected $statusRepository;

    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(): JsonResponse
    {
        $items = $this->statusRepository->list();

        return response()->json(['items' => $items]);
    }
}
