<?php

namespace App\Repositories;

use App\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class ClientsRepository.
 */
class OrderRepository extends AbstractRepository implements OrderRepositoryInterface
{
    protected $order;

    public function __construct(Order $order)
    {
        parent::__construct($order);
    }

    public function all(Request $request)
    {
        $orderBy = $request->orderBy ?? 'id';
        $sortBy = $request->sortBy && $request->sortBy === 'DESC' ? 'DESC' : 'ASC';
        $limit = ($request->limit) ?? 10;
        $pagination = !($request->pagination) || $request->pagination;

        if($orderBy === 'client')
            $orderBy = 'clients.name';
        if($orderBy === 'price')
            $orderBy = 'dishes.price';
        if($orderBy === 'date')
            $orderBy = 'orders.created_at';

        $model = $this->model
            ->select([
                'orders.id', 'orders.dish_id', 'orders.board_id', 'orders.client_id',
                'orders.user_id', 'orders.status_id', 'orders.created_at', 'orders.updated_at'
            ])->where('status_id', 3)
            ->with('client:id,name,cpf', 'user:id,name', 'status:id,name', 'board:id,number,description', 'dish:id,name,price')
            ->join('dishes', 'dishes.id' , '=', 'orders.dish_id')
            ->join('clients', 'clients.id' , '=', 'orders.client_id')
            ->orderBy($orderBy, $sortBy)
            ->groupBy('board_id', 'client_id', 'orders.id');

        /**
         * Filter by Board
         */
        if($request->board_id)
            $model->where('orders.board_id', $request->board_id);

        /**
         * Filter by Board
         */
        if($request->client)
            $model->where('clients.cpf', $request->client)
                ->orWhere('clients.name', 'like', '%' . $request->client . '%');

        /**
         * Filter by date and period
         */
        if($request->period) {
            $date = ($request->date) ? Carbon::createFromFormat('d/m/Y', $request->date) : Carbon::now();

            $rangeDates = $this->_getDateByFilter($request->period, $date);

            $model->where('orders.created_at', '>=', $rangeDates['firstDate']);
            $model->where('orders.created_at', '<=', $rangeDates['endDate']);
        }

        if($pagination)
            return $model->paginate($request->input('limit', $limit));
        else
            return $model->get()->limit($limit);
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

    private function _getDateByFilter($type, $date): array
    {
        switch ($type) {
            case 'month':
                $startDate = $date->copy()->startOfMonth();
                $endDate = $date->copy()->endOfMonth();
                break;
            case 'week':
                $startDate = $date->copy()->startOfWeek();
                $endDate = $date->copy()->endOfWeek();
                break;
            case 'day':
                $startDate = $date->copy()->startOfDay();
                $endDate = $date->copy()->endOfDay();
                break;
            default:
                break;
        }

        return [
            'firstDate' => $startDate,
            'endDate' => $endDate
        ];
    }
}
