<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *   path="/users",
     *   tags={"users"},
     *   @OA\Response(response="200", description="List of users"),
     * )
     */
    public function index(): \Illuminate\Http\JsonResponse
    {

        return response()->json([
            'status' => 'true',
            'data' => User::all()
        ]);
    }
}
