<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use App\Repositories\ClientRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->clientRepository->all($request);

        return response()->json(['items' => $items]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(): JsonResponse
    {
        $items = $this->clientRepository->list();

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
            $item = $this->clientRepository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ClientRequest $request)
    {
        try {
            $item = $this->clientRepository->store($request);
            return response()->json(['item' => $item]);

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, ClientRequest $request)
    {
        try {
            $item = $this->clientRepository->update($id, $request);
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
            $this->clientRepository->delete($id);
            return response()->json(['message' => 'Successfully deleted.']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
