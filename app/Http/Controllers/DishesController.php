<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\DishRequest;
use App\Repositories\DishRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    protected $dishRepository;

    public function __construct(DishRepository $dishRepository)
    {
        $this->dishRepository = $dishRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $items = $this->dishRepository->all($request);

        return response()->json(['items' => $items]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(): JsonResponse
    {
        $items = $this->dishRepository->list();

        return response()->json(['items' => $items]);
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $item = $this->dishRepository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DishRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DishRequest $request)
    {
        try {
            $item = $this->dishRepository->store($request);
            return response()->json(['item' => $item]);

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DishRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, DishRequest $request)
    {
        try {
            $item = $this->dishRepository->update($id, $request);
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
            $this->dishRepository->delete($id);
            return response()->json(['message' => 'Successfully deleted.']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
