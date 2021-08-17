<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Repositories\CookerOrderRepository;
use Illuminate\Http\Request;

class CookerOrdersController extends Controller
{
    protected $cookerOrderRepository;

    public function __construct(CookerOrderRepository $cookerOrderRepository)
    {
        $this->cookerOrderRepository = $cookerOrderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $items = $this->cookerOrderRepository->all($request);

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
            $item = $this->cookerOrderRepository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, OrderRequest $request)
    {
        try {
            $item = $this->cookerOrderRepository->update($id, $request);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
