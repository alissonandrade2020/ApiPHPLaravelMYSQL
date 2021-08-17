<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $items = $this->orderRepository->all($request);

        return response()->json(['items' => $items]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $item = $this->orderRepository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
