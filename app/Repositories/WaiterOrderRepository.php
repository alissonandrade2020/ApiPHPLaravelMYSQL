<?php

namespace App\Repositories;

use App\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ClientsRepository.
 */
class WaiterOrderRepository extends AbstractRepository implements OrderRepositoryInterface
{
    protected $order;

    public function __construct(Order $order)
    {
        parent::__construct($order);
    }

    public function all(Request $request)
    {
        $orderBy = ($request->input('orderBy')) ? $request->input('orderBy') : 'id';
        $sortBy = ($request->input('sortBy') && $request->input('sortBy') === 'DESC') ? 'DESC' : 'ASC';
        $limit = ($request->input('limit')) ? $request->input('limit') : 10;
        $pagination = !($request->input('pagination')) || $request->input('pagination');

        $model = $this->model
            ->where('user_id', Auth::user()->id)
            ->whereIn('status_id', [2, 3])
            ->with('client:id,name,cpf', 'user:id,name', 'status:id,name', 'board:id,number', 'dish:id,name')
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if($pagination)
            return $model->paginate();
        else
            return $model->get();
    }

    public function show($id)
    {
        $order = $this->model->findOrFail($id);

        if($order) {
            $order->client;
            $order->board;
            $order->user;
            $order->status;
            $order->client;
        }

        return $order;
    }

    public function store(Request $request)
    {
        $request->request->set('user_id', Auth::user()->id);

        return parent::store($request);
    }
}
