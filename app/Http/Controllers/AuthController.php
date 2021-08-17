<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Repositories\AuthRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(AuthRequest $request)
    {
        $user = $this->authRepository->getByEmail($request);

        // Check password
        if(!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'Incorrect Credentials'
            ], 401);
        }

        $token = $user->createToken('apptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout() {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
