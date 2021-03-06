<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTokenRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class UserTokenController extends Controller
{
    public function __invoke(UserTokenRequest $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if(!$user) {
            throw ValidationException::withMessages([
                'email' => 'The email does not exist or does not match our data'
            ]);
        }

        if(!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Password Error'
            ]);
        }

        return response() -> json([
            'token' => $user->createToken($request->device_name)->plainTextToken
        ]);
    }
}
