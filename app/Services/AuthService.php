<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public function register(array $userData) {

        return User::create([
            'username' => $userData['username'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password'])
        ]);
    }

    public function login(array $loginData):bool {
        if (Auth::attempt($loginData)) {
            return true;
        }
        return false;
    }

}
