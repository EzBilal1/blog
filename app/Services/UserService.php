<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * Register a new user and generate an access token.
     *
     * @param array $data
     * @return array
     */
    public function register(array $data): array
    {
        $user = $this->createUser($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'status' => true,
            'message' => 'User registered successfully.',
            'user' => $user,
            'token' => $token,
        ];
    }

    /**
     * Authenticate user and return token if credentials are valid.
     *
     * @param array $credentials
     * @return array
     */
    public function login(array $credentials): array
    {
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return [
                'status' => false,
                'message' => 'Invalid credentials.',
            ];
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'status' => true,
            'message' => 'Login successful.',
            'user' => $user,
            'token' => $token,
        ];
    }

    /**
     * Create a new user instance.
     *
     * @param array $data
     * @return User
     */
    private function createUser(array $data): User
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);
    }
}
