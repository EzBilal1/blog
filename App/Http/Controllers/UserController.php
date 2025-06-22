<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        // write in console

        return view('auth.register');
    }

     public function showLogin()
    {
        // write in console

        return view('auth.login');
    }

    public function register(Request $request)
    {
        // dd($request->firstname);
        // Validate request
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);



        return redirect()->route('login.form')->with('success', 'Account created successfully! Please login.');
    }
    private function extractFirstName($fullname)
    {
        $parts = explode(' ', $fullname);
        return $parts[0] ?? $fullname;
    }

    private function extractLastName($fullname)
    {
        $parts = explode(' ', $fullname);
        array_shift($parts);
        return implode(' ', $parts) ?: '';
    }
}
