<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Repositories\WaiterOrderRepository;
use Illuminate\Http\Request;

class WaiterOrdersController extends Controller
{
    protected $waiterOrderRepository;

    public function __construct(WaiterOrderRepository $waiterOrderRepository)
    {
        $this->waiterOrderRepository = $waiterOrderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $items = $this->waiterOrderRepository->all($request);

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
            $item = $this->waiterOrderRepository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderRequest $request)
    {
        try {
            $item = $this->waiterOrderRepository->store($request);
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
            $item = $this->waiterOrderRepository->update($id, $request);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->waiterOrderRepository->delete($id);
            return response()->json(['message' => 'Successfully deleted.']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
