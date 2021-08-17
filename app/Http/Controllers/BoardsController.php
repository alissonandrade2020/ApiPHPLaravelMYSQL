<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Repositories\BoardRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoardsController extends Controller
{
    protected $boardRepository;

    public function __construct(BoardRepository $boardRepository)
    {
        $this->boardRepository = $boardRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\jsonResponse
     */
    public function index(Request $request)
    {
        $items = $this->boardRepository->all($request);

        return response()->json(['items' => $items]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(): JsonResponse
    {
        $items = $this->boardRepository->list();

        return response()->json(['items' => $items]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $item = $this->boardRepository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BoardRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BoardRequest $request)
    {
        try {
            $item = $this->boardRepository->store($request);
            return response()->json(['item' => $item]);

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BoardRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, BoardRequest $request)
    {
        try {
            $item = $this->boardRepository->update($id, $request);
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
            $this->boardRepository->delete($id);
            return response()->json(['message' => 'Successfully deleted.']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
