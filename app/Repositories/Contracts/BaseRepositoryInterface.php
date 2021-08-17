<?php


namespace App\Repositories\Contracts;


use Illuminate\Http\Request;

interface BaseRepositoryInterface
{
    public function all(Request $request);

    public function list();

    public function show(int $id);

    public function store(Request $request);

    public function update(int$id, Request $request);

    public function delete(int $id);
}
