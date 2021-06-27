<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Transformers\AdminTransformer;
use Illuminate\Http\Request;

class AdminController extends ApiController
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admins', ['except' => ['login']]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(): \Illuminate\Http\JsonResponse
    {
        $credentials = request(['name', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->httpUnauthorized();
        }

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(): \Illuminate\Http\JsonResponse
    {
        return $this->httpOK(auth()->user(), AdminTransformer::class);
    }

    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): \Illuminate\Http\JsonResponse
    {
        auth()->logout();

        return response()->json([
            'status'  => true,
            'message' => 'Successfully logged out',
        ]);
    }
}
