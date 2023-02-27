<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(AuthRequest $authRequest)
    {
        $user = User::where('email', request('email'))->firstOrFail();
        if(Hash::check(request('password'), $user->password)){
            $token = $user->createToken('SuperAdmin')->plainTextToken;
            return [
                'message' => 'Success !',
                'token' => $token
            ];
        }

        return [
            'message' => 'Failed !',
            'token' => ''
        ];
    }
}
