<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\Auth\SignInRequest;

use App\Http\Traits\SuccessResponse;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Auth\AuthUserResource;

use App\Exceptions\ErrorCredentials;

class AuthController extends Controller
{
    use SuccessResponse;

    public function SignIn(SignInRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw new ErrorCredentials('Las credenciales no coinciden');
        }

        $user = User::where('email', $data['email'])->firstOrFail();

        $user['token'] = $user->createToken('auth_token')->plainTextToken;

        return $this->response(AuthUserResource::make($user));
    }

    public function SignOut()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->response([], message: 'Successfully logged out');
    }
}
