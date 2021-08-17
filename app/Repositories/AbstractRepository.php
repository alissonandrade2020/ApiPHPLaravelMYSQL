<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class AbstractRepository.
 */
class AbstractRepository
{
    /**
     * Eloquent model instance.
     */
    protected $model;
    /**
     * load default class dependencies.
     *
     * @param Model $model Illuminate\Database\Eloquent\Model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * get collection of items in paginate format.
     *
     * @return Collection of items.
     */
    public function all(Request $request)
    {
        $orderBy = $request->orderBy ?? 'id';
        $sortBy = $request->sortBy && $request->sortBy === 'DESC' ? 'DESC' : 'ASC';
        $limit = ($request->limit) ?? 10;
        $pagination = !($request->pagination) || $request->pagination;

        $model = $this->model->orderBy($orderBy, $sortBy);

        if($pagination)
            return $model->paginate($request->input('limit', 10));
        else
            return $model->get()->limit($limit);
    }

    /**
     * @return array
     */
    public function list(): array
    {
        return $this->model->pluck('name', 'id')->toArray();
    }

    /**
     * create new record in database.
     *
     * @param Request $request Illuminate\Http\Request
     * @return saved model object with data.
     */
    public function store(Request $request)
    {
        $data = $this->setDataPayload($request);
        $item = $this->model;
        $item->fill($data);
        $item->save();

        return $item;
    }
    /**
     * update existing item.
     *
     * @param Integer $id integer item primary key.
     * @param Request $request Illuminate\Http\Request
     * @return send updated item object.
     */
    public function update($id, Request $request)
    {
        $data = $this->setDataPayload($request);
        $item = $this->model->findOrFail($id);
        $item->fill($data);
        $item->save();

        return $item;
    }
    /**
     * get requested item and send back.
     *
     * @param  Integer $id: integer primary key value.
     * @return send requested item data.
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
    /**
     * Delete item by primary key id.
     *
     * @param  Integer $id integer of primary key id.
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
    /**
     * set data for saving
     *
     * @param  Request $request Illuminate\Http\Request
     * @return array of data.
     */
    protected function setDataPayload(Request $request)
    {
        return $request->all();
    }
}
