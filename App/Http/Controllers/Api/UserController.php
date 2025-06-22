<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(['message' => 'User list endpoint']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = $this->userService->register($data);

        return response()->json($user, $user['status'] ? 201 : 400);
    }

    
    public function login(LoginUserRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->login($data);

        return response()->json($user, $user['status'] ? 200 : 401);
    }

    /**
     * Get the authenticated user from token.
     */
    public function userFromToken(Request $request)
    {
        $user = auth('sanctum')->user();
        if ($user) {
            return response()->json([
                'status' => true,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
