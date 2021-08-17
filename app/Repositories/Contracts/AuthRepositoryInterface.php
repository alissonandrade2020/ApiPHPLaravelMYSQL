<?php


namespace App\Repositories\Contracts;


use Illuminate\Http\Request;

interface AuthRepositoryInterface
{
    public function getByEmail(Request $request);
}
